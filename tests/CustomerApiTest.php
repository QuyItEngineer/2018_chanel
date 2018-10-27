<?php
namespace Tests;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeCustomerTrait;

class CustomerApiTest extends TestCase
{
    use MakeCustomerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCustomer()
    {
        $customer = $this->fakeCustomerData();
        $response = $this->json('POST', '/api/customers', $customer);
        $customer['birthday'] = date('m/d/Y', strtotime($customer['birthday']));
        $this->assertApiResponse($response, $customer);
    }

    /**
     * @test
     */
    public function testReadCustomer()
    {
        $customer = $this->makeCustomer();
        $response = $this->json('GET', '/api/customers/'.$customer->id);
        $customer['birthday'] = date('m/d/Y', strtotime($customer['birthday']));
        $this->assertApiResponse($response, $customer->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCustomer()
    {
        $customer = $this->makeCustomer();
        $editedCustomer = $this->fakeCustomerData();

        $response = $this->json('PUT', '/api/customers/'.$customer->id, $editedCustomer);
        $customer->birthday = $customer->birthday->format('m/d/Y');
        $this->assertApiResponse($response, $editedCustomer);
    }

    /**
     * @test
     */
    public function testDeleteCustomer()
    {
        $customer = $this->makeCustomer();
        $reponse = $this->json('DELETE', '/api/customers/'.$customer->id);

        $this->assertApiSuccess($reponse);
        $this->assertSoftDeleted('customers', ['id' => $customer->id]);
    }
}
