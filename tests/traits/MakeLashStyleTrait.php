<?php
namespace Tests\Traits;

use App;
use Faker\Factory as Faker;
use App\Models\LashStyle;
use App\Repositories\LashStyleRepository;

trait MakeLashStyleTrait
{
    /**
     * Create fake instance of LashStyle and save it in database
     *
     * @param array $lashStyleFields
     * @return LashStyle
     */
    public function makeLashStyle($lashStyleFields = [])
    {
        /** @var LashStyleRepository $lashStyleRepo */
        $lashStyleRepo = App::make(LashStyleRepository::class);
        $theme = $this->fakeLashStyleData($lashStyleFields);
        return $lashStyleRepo->create($theme);
    }

    /**
     * Get fake instance of LashStyle
     *
     * @param array $lashStyleFields
     * @return LashStyle
     */
    public function fakeLashStyle($lashStyleFields = [])
    {
        return new LashStyle($this->fakeLashStyleData($lashStyleFields));
    }

    /**
     * Get fake data of LashStyle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLashStyleData($lashStyleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'thumbnail' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $lashStyleFields);
    }
}
