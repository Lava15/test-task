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

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request, Contact $contact): ApiSuccessResponse|ApiErrorResponse
    {
        try {
            $contact->update($request->validated() + [
                    'user_id' => auth()->id()
                ]);
        } catch (Throwable $e) {
            return new ApiErrorResponse(
                e: $e,
                message: 'Failed to update a contact',
            );
        }

        return new ApiSuccessResponse(
            data: $contact,
            message: ['success' => 'Contact updated successfully'],
            statusCode: Response::HTTP_CREATED
        );
    }
}
