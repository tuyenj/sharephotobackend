<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\App\Photo::class, function (Faker $faker) {
    return [
        'id' => Str::random(12),
        'user_id' => factory(\App\User::class)->create()->id,
        'filename' => Str::random(12) . '.jpg',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
