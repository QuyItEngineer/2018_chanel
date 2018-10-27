<?php

use App\Models\StoryScript;
use App\Repositories\StoryScriptRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoryScriptRepositoryTest extends TestCase
{
    use MakeStoryScriptTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StoryScriptRepository
     */
    protected $storyScriptRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storyScriptRepo = App::make(StoryScriptRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStoryScript()
    {
        $storyScript = $this->fakeStoryScriptData();
        $createdStoryScript = $this->storyScriptRepo->create($storyScript);
        $createdStoryScript = $createdStoryScript->toArray();
        $this->assertArrayHasKey('id', $createdStoryScript);
        $this->assertNotNull($createdStoryScript['id'], 'Created StoryScript must have id specified');
        $this->assertNotNull(StoryScript::find($createdStoryScript['id']), 'StoryScript with given id must be in DB');
        $this->assertModelData($storyScript, $createdStoryScript);
    }

    /**
     * @test read
     */
    public function testReadStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $dbStoryScript = $this->storyScriptRepo->find($storyScript->id);
        $dbStoryScript = $dbStoryScript->toArray();
        $this->assertModelData($storyScript->toArray(), $dbStoryScript);
    }

    /**
     * @test update
     */
    public function testUpdateStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $fakeStoryScript = $this->fakeStoryScriptData();
        $updatedStoryScript = $this->storyScriptRepo->update($fakeStoryScript, $storyScript->id);
        $this->assertModelData($fakeStoryScript, $updatedStoryScript->toArray());
        $dbStoryScript = $this->storyScriptRepo->find($storyScript->id);
        $this->assertModelData($fakeStoryScript, $dbStoryScript->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStoryScript()
    {
        $storyScript = $this->makeStoryScript();
        $resp = $this->storyScriptRepo->delete($storyScript->id);
        $this->assertTrue($resp);
        $this->assertNull(StoryScript::find($storyScript->id), 'StoryScript should not exist in DB');
    }
}
