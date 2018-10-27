<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'phone' => $faker->unique()->phoneNumber,
        'avatar' => $faker->imageUrl(),
        'remember_token' => str_random(10),
    ];
});
