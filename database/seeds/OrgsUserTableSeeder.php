<?php

use Illuminate\Database\Seeder;
use App\{User, Orgs};

class OrgsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('uuid')->get();
        $orgs = Orgs::select('uuid')->get();

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
    }
}
