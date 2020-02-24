<?php

use Illuminate\Database\Seeder;
use App\Org;

class OrgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Org::class, 10)->create();
    }
}
