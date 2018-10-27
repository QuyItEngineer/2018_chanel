<?php
namespace Tests\Traits;

use App;
use Faker\Factory as Faker;
use App\Models\ServiceInformation;
use App\Repositories\ServiceInformationRepository;

trait MakeServiceInformationTrait
{
    /**
     * Create fake instance of ServiceInformation and save it in database
     *
     * @param array $serviceInformationFields
     * @return ServiceInformation
     */
    public function makeServiceInformation($serviceInformationFields = [])
    {
        /** @var ServiceInformationRepository $serviceInformationRepo */
        $serviceInformationRepo = App::make(ServiceInformationRepository::class);
        $theme = $this->fakeServiceInformationData($serviceInformationFields);
        return $serviceInformationRepo->create($theme);
    }

    /**
     * Get fake instance of ServiceInformation
     *
     * @param array $serviceInformationFields
     * @return ServiceInformation
     */
    public function fakeServiceInformation($serviceInformationFields = [])
    {
        return new ServiceInformation($this->fakeServiceInformationData($serviceInformationFields));
    }

    /**
     * Get fake data of ServiceInformation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeServiceInformationData($serviceInformationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'customer_id' => $fake->randomDigitNotNull,
            'lash_service_id' => $fake->randomDigitNotNull,
            'lash_style_id' => $fake->randomDigitNotNull,
            'lash_type_id' => $fake->randomDigitNotNull,
            'appointment_time' => $fake->date('Y-m-d H:i:s'),
            'lash_curl' => $fake->word,
            'lash_length' => $fake->randomDigitNotNull,
            'description' => $fake->text,
            'special_notes' => $fake->text,
            'message_bed_on' => $fake->numberBetween(0,1),
            'signature' => $fake->word,
            'total' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $serviceInformationFields);
    }
}
