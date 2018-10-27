<?php
namespace Tests\Traits;

use App;
use Faker\Factory as Faker;
use App\Models\LashService;
use App\Repositories\LashServiceRepository;

trait MakeLashServiceTrait
{
    /**
     * Create fake instance of LashService and save it in database
     *
     * @param array $lashServiceFields
     * @return LashService
     */
    public function makeLashService($lashServiceFields = [])
    {
        /** @var LashServiceRepository $lashServiceRepo */
        $lashServiceRepo = App::make(LashServiceRepository::class);
        $theme = $this->fakeLashServiceData($lashServiceFields);
        return $lashServiceRepo->create($theme);
    }

    /**
     * Get fake instance of LashService
     *
     * @param array $lashServiceFields
     * @return LashService
     */
    public function fakeLashService($lashServiceFields = [])
    {
        return new LashService($this->fakeLashServiceData($lashServiceFields));
    }

    /**
     * Get fake data of LashService
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLashServiceData($lashServiceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'thumbnail' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $lashServiceFields);
    }
}
