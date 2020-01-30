<?php

use Illuminate\Database\Seeder;
use App\Orgs;

class OrgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Orgs::class, 10)->create();
    }
}
