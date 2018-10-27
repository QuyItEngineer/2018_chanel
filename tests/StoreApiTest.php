<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeStoreTrait;

class StoreApiTest extends TestCase
{
    use MakeStoreTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStore()
    {
        $store = $this->fakeStoreData();
        $response = $this->json('POST', '/api/stores', $store);

        $this->assertApiResponse($response, $store);
    }

    /**
     * @test
     */
    public function testReadStore()
    {
        $store = $this->makeStore();
        $response = $this->json('GET', '/api/stores/'.$store->id);

        $this->assertApiResponse($response, $store->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStore()
    {
        $store = $this->makeStore();
        $editedStore = $this->fakeStoreData();

        $response = $this->json('PUT', '/api/stores/'.$store->id, $editedStore);

        $this->assertApiResponse($response, $editedStore);
    }

    /**
     * @test
     */
    public function testDeleteStore()
    {
        $store = $this->makeStore();
        $response = $this->json('DELETE', '/api/stores/'.$store->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('stores', ['id' => $store->id]);
    }
}
