<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Chanel::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'image' => 'public/images/logo.png',
        'description' => $faker->text(),
        'video_url' => 'video.mp4',
    ];
});
