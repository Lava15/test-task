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

class StoreController extends Controller
{
    public function __invoke(ContactEmailRequest $request, Contact $contact): ApiSuccessResponse|ApiErrorResponse
    {
        try {
            $email = ContactEmail::query()
                ->create($request->validated());
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to add an e-mail',
            );
        }

        return new ApiSuccessResponse(
            data: $email,
            message: ['success' => 'New e-mail added successfully'],
            statusCode: Response::HTTP_CREATED
        );
    }
}
