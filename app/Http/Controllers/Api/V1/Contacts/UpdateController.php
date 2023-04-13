<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request, Contact $contact): JsonResponse
    {
        if (!$contact) {
            return response()->json(
                ['message' => 'Contact not found'],
                status: Response::HTTP_NOT_FOUND
            );
        }

        $contact->update($request->validated());

        return response()->json([
            'data' => ContactResource::collection($contact),
            'message' => 'Contact updated successfully'
        ]);
    }
}
