<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UsersCheckStreakDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check-streak';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if users had any activity during the day and end the streak if not';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $yesterday = Carbon::yesterday();

        $inactiveUsers = User::whereDate('last_streak_update', '!=', $yesterday)->get();

        foreach ($inactiveUsers as $user) {

            $user->current_streak = 0;
            $user->save();
        }

        $this->info('User activity check completed.');
    }
}
