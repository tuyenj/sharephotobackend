<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_新しいユーザーを作成して返却ができる()
    {
        $data = [
            'name' => 'test_user',
            'email' => 'test_user@example.com',
            'password' => '1234567890'
        ];
        $response = $this->json('POST', route('register'), $data);

        $user = User::first();

        $this->assertEquals($data['name'], $user->name);

        $response->assertJson(['data'=>[
                    'name' => $user->name
                ]]);
    }
}
