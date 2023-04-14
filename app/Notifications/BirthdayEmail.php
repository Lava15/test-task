<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BirthdayEmail extends Notification
{
    use Queueable;
    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Happy Birthday!' . $notifiable->full_name)
            ->action('Here is your gift!', url('/'))
            ->line('Wishing you all the best!');
    }
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
