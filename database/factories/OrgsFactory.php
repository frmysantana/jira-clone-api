<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Orgs;
use Faker\Generator as Faker;
use App\User;

$factory->define(Orgs::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'ownerUuid' => User::orderByRaw("RAND()")->first()->uuid
    ];
});
