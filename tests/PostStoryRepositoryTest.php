<?php

use App\Models\PostStory;
use App\Repositories\PostStoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostStoryRepositoryTest extends TestCase
{
    use MakePostStoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostStoryRepository
     */
    protected $postStoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->postStoryRepo = App::make(PostStoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePostStory()
    {
        $postStory = $this->fakePostStoryData();
        $createdPostStory = $this->postStoryRepo->create($postStory);
        $createdPostStory = $createdPostStory->toArray();
        $this->assertArrayHasKey('id', $createdPostStory);
        $this->assertNotNull($createdPostStory['id'], 'Created PostStory must have id specified');
        $this->assertNotNull(PostStory::find($createdPostStory['id']), 'PostStory with given id must be in DB');
        $this->assertModelData($postStory, $createdPostStory);
    }

    /**
     * @test read
     */
    public function testReadPostStory()
    {
        $postStory = $this->makePostStory();
        $dbPostStory = $this->postStoryRepo->find($postStory->id);
        $dbPostStory = $dbPostStory->toArray();
        $this->assertModelData($postStory->toArray(), $dbPostStory);
    }

    /**
     * @test update
     */
    public function testUpdatePostStory()
    {
        $postStory = $this->makePostStory();
        $fakePostStory = $this->fakePostStoryData();
        $updatedPostStory = $this->postStoryRepo->update($fakePostStory, $postStory->id);
        $this->assertModelData($fakePostStory, $updatedPostStory->toArray());
        $dbPostStory = $this->postStoryRepo->find($postStory->id);
        $this->assertModelData($fakePostStory, $dbPostStory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePostStory()
    {
        $postStory = $this->makePostStory();
        $resp = $this->postStoryRepo->delete($postStory->id);
        $this->assertTrue($resp);
        $this->assertNull(PostStory::find($postStory->id), 'PostStory should not exist in DB');
    }
}
