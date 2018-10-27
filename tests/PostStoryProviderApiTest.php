<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostStoryProviderApiTest extends TestCase
{
    use MakePostStoryProviderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePostStoryProvider()
    {
        $postStoryProvider = $this->fakePostStoryProviderData();
        $this->json('POST', '/api/v1/postStoryProviders', $postStoryProvider);

        $this->assertApiResponse($postStoryProvider);
    }

    /**
     * @test
     */
    public function testReadPostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $this->json('GET', '/api/v1/postStoryProviders/'.$postStoryProvider->id);

        $this->assertApiResponse($postStoryProvider->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $editedPostStoryProvider = $this->fakePostStoryProviderData();

        $this->json('PUT', '/api/v1/postStoryProviders/'.$postStoryProvider->id, $editedPostStoryProvider);

        $this->assertApiResponse($editedPostStoryProvider);
    }

    /**
     * @test
     */
    public function testDeletePostStoryProvider()
    {
        $postStoryProvider = $this->makePostStoryProvider();
        $this->json('DELETE', '/api/v1/postStoryProviders/'.$postStoryProvider->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/postStoryProviders/'.$postStoryProvider->id);

        $this->assertResponseStatus(404);
    }
}
