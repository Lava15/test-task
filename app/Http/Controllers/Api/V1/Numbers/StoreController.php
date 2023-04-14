<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPhoneRequest;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(ContactPhoneRequest $request, Contact $contact)
    {
        $phoneNumber = PhoneNumber::query()
            ->create($request->validated());

        return response()->json(
            data: ['data' => $phoneNumber, 'message' => 'Phone number created successfully'],
            status: Response::HTTP_CREATED
        );
    }
}
