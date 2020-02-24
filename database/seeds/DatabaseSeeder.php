<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\{
    Str,
    Facades\DB, 
    Facades\Hash
};
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
        $this->call([
            UsersTableSeeder::class,
            OrgsTableSeeder::class,
            OrgsUserTableSeeder::class,
            ProjectsTableSeeder::class,
            ProjectUserTableSeeder::class,
            ProjectKeysTableSeeder::class,
            ColumnsTableSeeder::class,
            TasksTableSeeder::class
        ]);
    }
}
