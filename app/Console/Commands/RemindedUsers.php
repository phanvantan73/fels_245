<?php

namespace App\Console\Commands;

use App\Jobs\RemindedUsers;
use App\Models\User;
use Illuminate\Console\Command;
use DB;

class RemindUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to user for reminding';

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
        $users = User::all();

        $job = new RemindedUsers($users);
        dispatch($job);
    }
}
