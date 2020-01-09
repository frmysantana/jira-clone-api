<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'profileImg' => $faker->randomElement($array = array(
            '/assets/avatar1.svg', 
            '/assets/avatar2.svg', 
            '/assets/avatar3.svg', 
            '/assets/salad.png', 
            '/assets/vegeta.png', 
        ))
    ];
});
