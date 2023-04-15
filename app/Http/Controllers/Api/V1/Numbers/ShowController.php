<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactPhoneResource;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    public function __invoke(Contact $contact, PhoneNumber $number): JsonResponse
    {
        $number = $contact->phoneNumbers()->find($number);
        return response()->json(
            data: ContactPhoneResource::collection($number),
            status: Response::HTTP_OK
        );
    }
}
