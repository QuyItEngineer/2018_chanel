<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Chanel::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'image' => 'singer.jpg',
        'description' => $faker->text(),
        'video_url' => 'http://set.flashmediacast.com:1935/SET/livestream/playlist.m3u8',
        'category_id' => \App\Models\Category::first()->id,
    ];
});
