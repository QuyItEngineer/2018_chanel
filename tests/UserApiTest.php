<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\MakeUserTrait;

class UserApiTest extends TestCase
{
    use MakeUserTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUser()
    {
        $user = $this->fakeUserData();
        $response = $this->json('POST', '/api/users', $user);
        $this->assertApiResponse($response, $user);
    }

    /**
     * @test
     */
    public function testReadUser()
    {
        $user = $this->makeUser();
        $response = $this->json('GET', '/api/users/' . $user->id);

        $this->assertApiResponse($response, $user->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUser()
    {
        $user = $this->makeUser();
        $editedUser = $this->fakeUserData();

        $response = $this->json('PUT', '/api/users/' . $user->id, $editedUser);

        $this->assertApiResponse($response, $editedUser);
    }

    /**
     * @test
     */
    public function testDeleteUser()
    {
        $user = $this->makeUser();
        $response = $this->json('DELETE', '/api/users/' . $user->id);

        $this->assertApiSuccess($response);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }
}
