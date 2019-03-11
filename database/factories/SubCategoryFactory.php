<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\SubCategory::class, function (Faker $faker) {
    return [
        'title' => 'Thieu Nhi',
        'description' => $faker->text(),
        'image' => 'singer.jpg',
        'category_id' => 1
    ];
});
