<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class TruncateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all database records.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach($tables as $table)
        {
            $tableName = $table->Tables_in_jiraclone;

            DB::table($tableName)->delete();
        }
    }
}
