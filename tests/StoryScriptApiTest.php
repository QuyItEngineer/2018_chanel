<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoryScriptApiTest extends TestCase
{
    use MakeStoryScriptTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStoryScript()
    {
        $storyScript = $this->fakeStoryScriptData();
        $this->json('POST', '/api/v1/storyScripts', $storyScript);

        $this->assertApiResponse($storyScript);
    }

    /**
     * @test
     */
    public function testReadStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $this->json('GET', '/api/v1/storyScripts/'.$storyScript->id);

        $this->assertApiResponse($storyScript->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $editedStoryScript = $this->fakeStoryScriptData();

        $this->json('PUT', '/api/v1/storyScripts/'.$storyScript->id, $editedStoryScript);

        $this->assertApiResponse($editedStoryScript);
    }

    /**
     * @test
     */
    public function testDeleteStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $this->json('DELETE', '/api/v1/storyScripts/'.$storyScript->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/storyScripts/'.$storyScript->id);

        $this->assertResponseStatus(404);
    }
}
