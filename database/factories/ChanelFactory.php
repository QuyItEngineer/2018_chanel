<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Chanel::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'image' => 'images/singer.png',
        'description' => $faker->text(),
        'video_url' => 'video.mp4',
        'category_id' => \App\Models\Category::first()->id,
    ];
});
