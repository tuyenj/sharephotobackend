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
      $response = $this->actingAs($this->user);

      $response->json('POST',route('logout'));


      $this->assertAuthenticatedAs($this->user);
  }
}
