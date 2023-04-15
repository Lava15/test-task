<?php

namespace App\Jobs;

use App\Mail\BirthdayNotification;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BirthdayReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $contacts = $this->user->contacts()->whereDate('birthday', today())->get();
        $reveiverMail = $this->user['email'];
        if ($contacts->count() > 0) {
            foreach ($contacts as $contact) {
                Mail::raw("Today is birthday of $contact->full_name", function ($message) use ($reveiverMail) {
                    $message->from(env('ADMIN_EMAIL'), env('APP_NAME'));
                    $message->to($reveiverMail);
                    $message->subject('Nicesnippets.com');
                });
        }
        }
    }
}
