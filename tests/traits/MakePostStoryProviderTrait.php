<?php

use Faker\Factory as Faker;
use App\Models\PostStoryProvider;
use App\Repositories\PostStoryProviderRepository;

trait MakePostStoryProviderTrait
{
    /**
     * Create fake instance of PostStoryProvider and save it in database
     *
     * @param array $postStoryProviderFields
     * @return PostStoryProvider
     */
    public function makePostStoryProvider($postStoryProviderFields = [])
    {
        /** @var PostStoryProviderRepository $postStoryProviderRepo */
        $postStoryProviderRepo = App::make(PostStoryProviderRepository::class);
        $theme = $this->fakePostStoryProviderData($postStoryProviderFields);
        return $postStoryProviderRepo->create($theme);
    }

    /**
     * Get fake instance of PostStoryProvider
     *
     * @param array $postStoryProviderFields
     * @return PostStoryProvider
     */
    public function fakePostStoryProvider($postStoryProviderFields = [])
    {
        return new PostStoryProvider($this->fakePostStoryProviderData($postStoryProviderFields));
    }

    /**
     * Get fake data of PostStoryProvider
     *
     * @param array $postFields
     * @return array
     */
    public function fakePostStoryProviderData($postStoryProviderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'url' => $fake->word,
            'thumbnail' => $fake->word,
            'slug' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $postStoryProviderFields);
    }
}
