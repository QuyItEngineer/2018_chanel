<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeServiceInformationTrait;

class ServiceInformationApiTest extends TestCase
{
    use MakeServiceInformationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateServiceInformation()
    {
        $serviceInformation = $this->fakeServiceInformationData();
        $response = $this->json('POST', '/api/service_informations', $serviceInformation);

        $this->assertApiResponse($response, $serviceInformation);
    }

    /**
     * @test
     */
    public function testReadServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $response = $this->json('GET', '/api/service_informations/'.$serviceInformation->id);

        $this->assertApiResponse($response, $serviceInformation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $editedServiceInformation = $this->fakeServiceInformationData();

        $response = $this->json('PUT', '/api/service_informations/'.$serviceInformation->id, $editedServiceInformation);

        $this->assertApiResponse($response, $editedServiceInformation);
    }

    /**
     * @test
     */
    public function testDeleteServiceInformation()
    {
        $serviceInformation = $this->makeServiceInformation();
        $response = $this->json('DELETE', '/api/service_informations/'.$serviceInformation->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('service_informations', ['id' => $serviceInformation->id]);
    }
}
