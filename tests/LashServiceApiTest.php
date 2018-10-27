<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashServiceTrait;

class LashServiceApiTest extends TestCase
{
    use MakeLashServiceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLashService()
    {
        $lashService = $this->fakeLashServiceData();
        $response = $this->json('POST', '/api/lash_services', $lashService);

        $this->assertApiResponse($response, $lashService);
    }

    /**
     * @test
     */
    public function testReadLashService()
    {
        $lashService = $this->makeLashService();
        $response = $this->json('GET', '/api/lash_services/'.$lashService->id);

        $this->assertApiResponse($response, $lashService->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLashService()
    {
        $lashService = $this->makeLashService();
        $editedLashService = $this->fakeLashServiceData();

        $response = $this->json('PUT', '/api/lash_services/'.$lashService->id, $editedLashService);

        $this->assertApiResponse($response, $editedLashService);
    }

    /**
     * @test
     */
    public function testDeleteLashService()
    {
        $lashService = $this->makeLashService();
        $response = $this->json('DELETE', '/api/lash_services/'.$lashService->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('lash_services', ['id' => $lashService->id]);
    }
}
