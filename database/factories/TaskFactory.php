<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Org;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $org = Org::orderByRaw("RAND()")->first();
    $project = $org->projects->shuffle();
    var_dump($project);
    $users = $org->users->shuffle();
    $columns = $project[0]->columns;
    $taskCount = Task::all()->count() + 1;

    // TODO: better ui sequence (numerical order that task was made for that project)
    return [
        'orgUuid' => $org->uuid,
        'projectUuid' => $project[0]->uuid,
        'reporterUuid' => $users[0]->uuid,
        'assigneeUuid' => $users[1]->uuid,
        'columnUuid' => $columns[rand(0,2)]->uuid,
        'name' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 5),
        'uiSequence' => $taskCount
    ];
});
