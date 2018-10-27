<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorApiTest extends TestCase
{
    use MakeAuthorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAuthor()
    {
        $author = $this->fakeAuthorData();
        $this->json('POST', '/api/v1/authors', $author);

        $this->assertApiResponse($author);
    }

    /**
     * @test
     */
    public function testReadAuthor()
    {
        $author = $this->makeAuthor();
        $this->json('GET', '/api/v1/authors/'.$author->id);

        $this->assertApiResponse($author->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAuthor()
    {
        $author = $this->makeAuthor();
        $editedAuthor = $this->fakeAuthorData();

        $this->json('PUT', '/api/v1/authors/'.$author->id, $editedAuthor);

        $this->assertApiResponse($editedAuthor);
    }

    /**
     * @test
     */
    public function testDeleteAuthor()
    {
        $author = $this->makeAuthor();
        $this->json('DELETE', '/api/v1/authors/'.$author->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/authors/'.$author->id);

        $this->assertResponseStatus(404);
    }
}
