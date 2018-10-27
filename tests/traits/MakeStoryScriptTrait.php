<?php

use Faker\Factory as Faker;
use App\Models\StoryScript;
use App\Repositories\StoryScriptRepository;

trait MakeStoryScriptTrait
{
    /**
     * Create fake instance of StoryScript and save it in database
     *
     * @param array $storyScriptFields
     * @return StoryScript
     */
    public function makeStoryScript($storyScriptFields = [])
    {
        /** @var StoryScriptRepository $storyScriptRepo */
        $storyScriptRepo = App::make(StoryScriptRepository::class);
        $theme = $this->fakeStoryScriptData($storyScriptFields);
        return $storyScriptRepo->create($theme);
    }

    /**
     * Get fake instance of StoryScript
     *
     * @param array $storyScriptFields
     * @return StoryScript
     */
    public function fakeStoryScript($storyScriptFields = [])
    {
        return new StoryScript($this->fakeStoryScriptData($storyScriptFields));
    }

    /**
     * Get fake data of StoryScript
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStoryScriptData($storyScriptFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'script' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $storyScriptFields);
    }
}
