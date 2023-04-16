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

class UpdateController extends Controller
{
    public function __invoke(ContactPhoneRequest $request, Contact $contact, PhoneNumber $number): ApiSuccessResponse|ApiErrorResponse
    {

        try {
            $number->update($request->validated());
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to update a phone number',
            );
        }
        return new ApiSuccessResponse(
            data: $number,
            message: ['success' => 'New phone number updated successfully'],
            statusCode: Response::HTTP_CREATED
        );
    }
}
