<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\BirthdayEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckBirthdayCommand extends Command
{
    protected $signature = 'check:birthday';

    protected $description = 'Cronjob for checking birthdays and sending emails';

    public function handle()
    {
        $users = User::query()->with('contacts')->get();

        foreach ($users as $user) {
            $contacts = $user->contacts()->whereDate('birthday', today())->get();
            if ($contacts->count() > 0) {
                foreach ($contacts as $contact) {
                    Notification::send($contact, new BirthdayEmail());
                }
            }
        }

        $this->info('Successfully sent birthday emails to contacts.');
    }

}
