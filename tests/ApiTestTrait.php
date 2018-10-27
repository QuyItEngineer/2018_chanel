<?php
namespace Tests;
use Illuminate\Foundation\Testing\TestResponse;

trait ApiTestTrait
{
    public function assertApiResponse(TestResponse $response, Array $actualData)
    {
        $this->assertApiSuccess($response);

        $response = json_decode($response->getContent(), true);
        $responseData = $response['data'];

        $this->assertNotEmpty($responseData['id']);
        $this->assertModelData($actualData, $responseData);
    }

    public function assertApiSuccess(TestResponse $response)
    {
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    public function assertModelData(Array $actualData, Array $expectedData, Array $ignoredField = ['created_at', 'updated_at', 'deleted_at'])
    {
        foreach ($actualData as $key => $value) {
            if(in_array($key, $ignoredField)) {
                continue;
            }
            $this->assertEquals($actualData[$key], $expectedData[$key], "Failed asserting that two strings are equal at [{$key}]");
        }
    }
}