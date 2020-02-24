<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{ Project, Org };
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'orgUuid' => Org::orderByRaw("RAND()")->first()->uuid,
        'name' => $faker->words(rand(1, 5), true),
        'icon' => $faker->imageUrl()
    ];
});
