<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends Controller
{
    public function __invoke(Contact $contact, PhoneNumber $number)
    {
        $number = $contact->phoneNumbers()->find($number);
        $number->delete();
        return response()->json(
            data: ['message' => 'Email deleted successfully'],
            status: Response::HTTP_NO_CONTENT
        );
    }
}
