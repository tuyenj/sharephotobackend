<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }


    public function test_ログアウトができる()
    {
        $this->json('POST', route('login'), [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        $response = $this->json('POST', route('logout'));
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
