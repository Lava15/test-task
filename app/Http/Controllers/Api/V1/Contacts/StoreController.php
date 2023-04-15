<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Responses\ApiErrorResponse;
use App\Responses\ApiSuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class StoreController extends Controller
{
    public function __invoke(ContactRequest $request): ApiSuccessResponse|ApiErrorResponse
    {
        try {
            $contact = Contact::query()
                ->create($request->validated());
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to create a contact',
            );
        }

        return new ApiSuccessResponse(
            data: $contact,
            message: ['success' => 'Contact created successfully'],
            statusCode: Response::HTTP_CREATED
        );

    }
}
