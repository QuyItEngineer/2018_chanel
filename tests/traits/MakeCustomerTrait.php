<?php
namespace Tests\Traits;

use App;
use Faker\Factory as Faker;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

trait MakeCustomerTrait
{
    /**
     * Create fake instance of Customer and save it in database
     *
     * @param array $customerFields
     * @return Customer
     */
    public function makeCustomer($customerFields = [])
    {
        /** @var CustomerRepository $customerRepo */
        $customerRepo = App::make(CustomerRepository::class);
        $theme = $this->fakeCustomerData($customerFields);
        return $customerRepo->create($theme);
    }

    /**
     * Get fake instance of Customer
     *
     * @param array $customerFields
     * @return Customer
     */
    public function fakeCustomer($customerFields = [])
    {
        return new Customer($this->fakeCustomerData($customerFields));
    }

    /**
     * Get fake data of Customer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCustomerData($customerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'store_id' => $fake->randomDigitNotNull,
            'phone' => $fake->word,
            'email' => $fake->word,
            'address' => $fake->word,
            'city' => $fake->word,
            'state' => $fake->word,
            'zip_code' => $fake->word,
            'type' => $fake->randomDigitNotNull,
            'gender' => $fake->numberBetween(0,1),
            'birthday' => $fake->date('Y-m-d H:i:s'),
            'note' => $fake->text,
            'membership' => $fake->numberBetween(0,1),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $customerFields);
    }
}
