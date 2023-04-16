<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactEmailRequest;
use App\Models\Contact;
use App\Models\ContactEmail;
use App\Responses\ApiErrorResponse;
use App\Responses\ApiSuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UpdateController extends Controller
{
    public function __invoke(ContactEmailRequest $request, Contact $contact, ContactEmail $email): ApiSuccessResponse|ApiErrorResponse
    {
        try {
            $email->update($request->validated());
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to update an e-mail',
            );
        }
        return new ApiSuccessResponse(
            data: $email,
            message: ['success' => 'Email updated successfully'],
            statusCode: Response::HTTP_CREATED
        );
    }
}
