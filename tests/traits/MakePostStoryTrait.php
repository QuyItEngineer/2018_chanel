<?php

use Faker\Factory as Faker;
use App\Models\PostStory;
use App\Repositories\PostStoryRepository;

trait MakePostStoryTrait
{
    /**
     * Create fake instance of PostStory and save it in database
     *
     * @param array $postStoryFields
     * @return PostStory
     */
    public function makePostStory($postStoryFields = [])
    {
        /** @var PostStoryRepository $postStoryRepo */
        $postStoryRepo = App::make(PostStoryRepository::class);
        $theme = $this->fakePostStoryData($postStoryFields);
        return $postStoryRepo->create($theme);
    }

    /**
     * Get fake instance of PostStory
     *
     * @param array $postStoryFields
     * @return PostStory
     */
    public function fakePostStory($postStoryFields = [])
    {
        return new PostStory($this->fakePostStoryData($postStoryFields));
    }

    /**
     * Get fake data of PostStory
     *
     * @param array $postFields
     * @return array
     */
    public function fakePostStoryData($postStoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'source' => $fake->word,
            'number_of_chapter' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'post_story_provider_id' => $fake->randomDigitNotNull,
            'thumbnail' => $fake->word,
            'author_id' => $fake->randomDigitNotNull,
            'type' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $postStoryFields);
    }
}
