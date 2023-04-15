<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class SendBirthdayReminderTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_sends_birthday_reminder_to_user()
    {
        Carbon::setTestNow(Carbon::parse('9:00:00'));
        $user = User::factory()->create();
        $contact1 = Contact::factory()->create([
            'user_id' => $user->id,
            'full_name' => Str::words(3),
            'birthday' => now()->format('Y-m-d')
        ]);
        $contact2 = Contact::factory()->create([
            'user_id' => $user->id,
            'full_name' => Str::words(3),
            'birthday' => now()->format('Y-m-d')
        ]);

        Artisan::call('queue:flush');
        Artisan::call('check:birthday');
    }
}
