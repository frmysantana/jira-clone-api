<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Projects;
use App\Orgs;
use Faker\Generator as Faker;

$factory->define(Projects::class, function (Faker $faker) {
    return [
        'orgUuid' => Orgs::orderByRaw("RAND()")->first()->uuid,
        'name' => $faker->words(rand(1, 5), true),
        'icon' => $faker->imageUrl()
    ];
});
