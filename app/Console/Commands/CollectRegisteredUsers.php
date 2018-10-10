<?php

namespace App\Console\Commands;

use App\Jobs\SendTotalRegisteredUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use DB;

class CollectRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email of registered users';

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
        $now = Carbon::now();
        $totalUsers = User::whereDate('created_at', $now)
            ->count();

        $job = (new SendTotalRegisteredUser($totalUsers));
        dispatch($job);
    }
}
