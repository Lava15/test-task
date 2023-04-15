<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactPhoneResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(Contact $contact): JsonResponse
    {
        $phoneNumber = $contact->phoneNumbers;

        return response()->json(
            data: ContactPhoneResource::collection($phoneNumber),
            status: Response::HTTP_OK
        );
    }
}
