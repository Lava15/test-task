<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(ContactRequest $request): JsonResponse
    {
        $contact = Contact::query()
            ->create($request->validated());
        return response()->json(
            data: ['data' => $contact, 'message' => 'Contact created successfully'],
            status: Response::HTTP_CREATED
        );

    }
}
