<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function test_登録済みのユーザーを認証して返却する()
    {
        $response = $this->json('POST',route('login'),[
            'email'=>$this->user->email,
            'password'=>'password'
        ]);

        $response->assertStatus(200)
                ->assertJson(['data'=>[
                    'email'=>$this->user->email
                ]]);
        $this->assertAuthenticatedAs($this->user);
    }
}
