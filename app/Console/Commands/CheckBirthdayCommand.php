<?php

namespace App\Console\Commands;

use App\Jobs\BirthdayReminder;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckBirthdayCommand extends Command
{
    protected $signature = 'check:birthday';

    protected $description = 'Cronjob for checking birthdays and sending reminder emails';

    public function handle()
    {
        $users = User::query()->get();
        foreach ($users as $user) {
            BirthdayReminder::dispatch($user);
        }
    }

}
