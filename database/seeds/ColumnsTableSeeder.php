<?php

use Illuminate\Database\Seeder;
use App\Projects;

class ColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Projects::select('uuid')->get();

        // each project starts with a standard 'TO DO' (first), 'IN PROGRESS' (second), AND 'DONE' (third)
        // need name, projectUuid, uiSequence
        $projects->map(function($project) {
            DB::table('columns')->insert([
                'projectUuid' => $project->uuid,
                'name' => 'TO DO',
                'uiSequence' => 1
            ]);
            
            DB::table('columns')->insert([
                'projectUuid' => $project->uuid,
                'name' => 'IN PROGRESS',
                'uiSequence' => 2
            ]);

            DB::table('columns')->insert([
                'projectUuid' => $project->uuid,
                'name' => 'DONE',
                'uiSequence' => 3
            ]);
        });
    }
}
