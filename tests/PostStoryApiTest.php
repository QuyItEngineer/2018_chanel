<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostStoryApiTest extends TestCase
{
    use MakePostStoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePostStory()
    {
        $postStory = $this->fakePostStoryData();
        $this->json('POST', '/api/v1/postStories', $postStory);

        $this->assertApiResponse($postStory);
    }

    /**
     * @test
     */
    public function testReadPostStory()
    {
        $postStory = $this->makePostStory();
        $this->json('GET', '/api/v1/postStories/'.$postStory->id);

        $this->assertApiResponse($postStory->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePostStory()
    {
        $postStory = $this->makePostStory();
        $editedPostStory = $this->fakePostStoryData();

        $this->json('PUT', '/api/v1/postStories/'.$postStory->id, $editedPostStory);

        $this->assertApiResponse($editedPostStory);
    }

    /**
     * @test
     */
    public function testDeletePostStory()
    {
        $postStory = $this->makePostStory();
        $this->json('DELETE', '/api/v1/postStories/'.$postStory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/postStories/'.$postStory->id);

        $this->assertResponseStatus(404);
    }
}
