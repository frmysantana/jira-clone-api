<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create();
        factory(App\Orgs::class, 10)->create();
        factory(App\Projects::class, 20)->create();
        
        $users = App\User::select('uuid')->get();
        $orgs = App\Orgs::select('uuid')->get();

        $i = 0;

        foreach($users as $user)
        {
            DB::table('orgs_user')->insert([
                'orgUuid' => $orgs[$i]->uuid,
                'userUuid' => $user->uuid,
                'isAdmin' => rand(0,1)
            ]);

            $i = ($i === 9) ? 0 : $i + 1; 
        }

        $projects = App\Projects::select('uuid', 'orgUuid')->get();

        foreach($projects as $project)
        {
            $orgUuid = $project->orgUuid;
            $orgIndex = $orgs->search(function ($item, $key) use ($orgUuid) {
                return $item['uuid'] === $orgUuid;
            });
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
