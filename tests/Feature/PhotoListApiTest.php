<?php

namespace Tests\Feature;

use App\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhotoListApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_正しい構築のJSONを返却する()
    {
        factory(Photo::class, 5)->create();
        $response = $this->json('GET', route('photo.index'));
        $photo = Photo::with(['owner'])->orderBy('created_at', 'desc')->get();

        $expected_data = $photo->map(function ($photo) {
            return [
                'id' => $photo->id,
                'url' => $photo->url,
                'owner' => [
                    'name' => $photo->owner->name
                ]
            ];
        })->all();
        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonFragment(["data" => $expected_data]);
    }
}
