<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectKeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::select('uuid', 'name', 'orgUuid')->get();

        // projects is a collection
        $projects->map( function ($project) {
            DB::table('project_keys')->insert([
                'key' => substr($project->name, 0, 4),
                'projectUuid' => $project->uuid,
                'orgUuid' => $project->orgUuid
            ]);
        });
    }
}
