<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPhoneRequest;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(ContactPhoneRequest $request, Contact $contact, PhoneNumber $number)
    {
        $number = $contact->phoneNumbers()->find($number);

        $number->query()->update($request->validated());

        return response()->json(
            data: ['data' => $number, 'message' => 'Email updated successfully'],
            status: Response::HTTP_CREATED
        );
    }
}
