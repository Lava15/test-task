<?php

namespace App\Http\Controllers\Api\V1\Numbers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPhoneRequest;
use App\Models\Contact;
use App\Models\PhoneNumber;
use App\Responses\ApiErrorResponse;
use App\Responses\ApiSuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class StoreController extends Controller
{
    public function __invoke(ContactPhoneRequest $request, Contact $contact): ApiSuccessResponse|ApiErrorResponse
    {

        try {
            $number = PhoneNumber::query()
                ->create($request->validated());
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to add a phone number',
            );
        }

        return new ApiSuccessResponse(
            data: $number,
            message: ['success' => 'New phone number added successfully'],
            statusCode: Response::HTTP_CREATED
        );
    }
}
