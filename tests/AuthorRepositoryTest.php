<?php

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorRepositoryTest extends TestCase
{
    use MakeAuthorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AuthorRepository
     */
    protected $authorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->authorRepo = App::make(AuthorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAuthor()
    {
        $author = $this->fakeAuthorData();
        $createdAuthor = $this->authorRepo->create($author);
        $createdAuthor = $createdAuthor->toArray();
        $this->assertArrayHasKey('id', $createdAuthor);
        $this->assertNotNull($createdAuthor['id'], 'Created Author must have id specified');
        $this->assertNotNull(Author::find($createdAuthor['id']), 'Author with given id must be in DB');
        $this->assertModelData($author, $createdAuthor);
    }

    /**
     * @test read
     */
    public function testReadAuthor()
    {
        $author = $this->makeAuthor();
        $dbAuthor = $this->authorRepo->find($author->id);
        $dbAuthor = $dbAuthor->toArray();
        $this->assertModelData($author->toArray(), $dbAuthor);
    }

    /**
     * @test update
     */
    public function testUpdateAuthor()
    {
        $author = $this->makeAuthor();
        $fakeAuthor = $this->fakeAuthorData();
        $updatedAuthor = $this->authorRepo->update($fakeAuthor, $author->id);
        $this->assertModelData($fakeAuthor, $updatedAuthor->toArray());
        $dbAuthor = $this->authorRepo->find($author->id);
        $this->assertModelData($fakeAuthor, $dbAuthor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAuthor()
    {
        $author = $this->makeAuthor();
        $resp = $this->authorRepo->delete($author->id);
        $this->assertTrue($resp);
        $this->assertNull(Author::find($author->id), 'Author should not exist in DB');
    }
}
