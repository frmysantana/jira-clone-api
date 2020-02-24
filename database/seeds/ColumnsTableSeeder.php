<?php

use Illuminate\Database\Seeder;
use App\Project;

class ColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::select('uuid')->get();

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
