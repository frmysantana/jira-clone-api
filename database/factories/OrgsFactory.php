<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{ User, Org };
use Faker\Generator as Faker;

$factory->define(Org::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'ownerUuid' => User::orderByRaw("RAND()")->first()->uuid
    ];
});
