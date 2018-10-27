<?php
namespace Tests\Traits;

use App;
use Faker\Factory as Faker;
use App\Models\LashType;
use App\Repositories\LashTypeRepository;

trait MakeLashTypeTrait
{
    /**
     * Create fake instance of LashType and save it in database
     *
     * @param array $lashTypeFields
     * @return LashType
     */
    public function makeLashType($lashTypeFields = [])
    {
        /** @var LashTypeRepository $lashTypeRepo */
        $lashTypeRepo = App::make(LashTypeRepository::class);
        $theme = $this->fakeLashTypeData($lashTypeFields);
        return $lashTypeRepo->create($theme);
    }

    /**
     * Get fake instance of LashType
     *
     * @param array $lashTypeFields
     * @return LashType
     */
    public function fakeLashType($lashTypeFields = [])
    {
        return new LashType($this->fakeLashTypeData($lashTypeFields));
    }

    /**
     * Get fake data of LashType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLashTypeData($lashTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'thumbnail' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $lashTypeFields);
    }
}
