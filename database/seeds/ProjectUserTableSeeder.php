<?php

use Illuminate\Database\Seeder;
use App\{ Org, Project };

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $projects = Project::select('uuid', 'orgUuid')->get();

        $orgs = Org::select('uuid')->get();
        
        foreach($projects as $project)
        {
            $orgUuid = $project->orgUuid;
            $orgIndex = $orgs->search(fn (Org $item) : bool => $item['uuid'] === $orgUuid);
            $users = $orgs[$orgIndex]->users;
            $maxParticipants = $users->count();
            $max = rand(1, $maxParticipants);

            for ($i = 0; $i < $max; $i++) {
                DB::table('project_User')->insert([
                    'projectUuid' => $project->uuid,
                    'userUuid' => $users[$i]->uuid
                ]);
            }
        }
    }
}
