<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeLashStyleTrait;

class LashStyleApiTest extends TestCase
{
    use MakeLashStyleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLashStyle()
    {
        $lashStyle = $this->fakeLashStyleData();
        $response = $this->json('POST', '/api/lash_styles', $lashStyle);

        $this->assertApiResponse($response, $lashStyle);
    }

    /**
     * @test
     */
    public function testReadLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $response = $this->json('GET', '/api/lash_styles/'.$lashStyle->id);

        $this->assertApiResponse($response, $lashStyle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $editedLashStyle = $this->fakeLashStyleData();

        $response = $this->json('PUT', '/api/lash_styles/'.$lashStyle->id, $editedLashStyle);

        $this->assertApiResponse($response, $editedLashStyle);
    }

    /**
     * @test
     */
    public function testDeleteLashStyle()
    {
        $lashStyle = $this->makeLashStyle();
        $response = $this->json('DELETE', '/api/lash_styles/'.$lashStyle->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('lash_styles', ['id' => $lashStyle->id]);
    }
}
