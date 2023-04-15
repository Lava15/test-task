<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ContactHasUniqueFullbaneTest extends TestCase
{
    use RefreshDatabase;

    public function test_contacts_fullname_for_uniqueness(): void
    {
        $user = User::factory()->create();
        $contact1 = Contact::factory()->create([
            'user_id' => $user->id,
            'full_name' => 'John Doe',
            'birthday' => now()->format('Y-m-d')
        ]);
        $contact2 = Contact::factory()->create([
            'user_id' => $user->id,
            'full_name' => 'John Doe',
            'birthday' => now()->format('Y-m-d')
        ]);
        $this->assertFalse($user->contacts->contains('full_name', $contact2->full_name));

        $contact2->user_id = $contact1->user_id;
        $this->assertTrue($contact1->fresh()->is($contact2));
    }
}
