<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->text(),
        'url_banner' => 'public/images/logo.png',
        'description' => $faker->text()
    ];
});
