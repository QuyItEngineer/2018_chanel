<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashTypeTrait;

class LashTypeApiTest extends TestCase
{
    use MakeLashTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLashType()
    {
        $lashType = $this->fakeLashTypeData();
        $response = $this->json('POST', '/api/lash_types', $lashType);

        $this->assertApiResponse($response, $lashType);
    }

    /**
     * @test
     */
    public function testReadLashType()
    {
        $lashType = $this->makeLashType();
        $response = $this->json('GET', '/api/lash_types/'.$lashType->id);

        $this->assertApiResponse($response, $lashType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLashType()
    {
        $lashType = $this->makeLashType();
        $editedLashType = $this->fakeLashTypeData();

        $response = $this->json('PUT', '/api/lash_types/'.$lashType->id, $editedLashType);

        $this->assertApiResponse($response, $editedLashType);
    }

    /**
     * @test
     */
    public function testDeleteLashType()
    {
        $lashType = $this->makeLashType();
        $response = $this->json('DELETE', '/api/lash_types/'.$lashType->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('lash_types', ['id' => $lashType->id]);
    }
}
