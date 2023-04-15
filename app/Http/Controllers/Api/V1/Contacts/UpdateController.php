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
        $contact->update($request->validated());
        return response()->json([
            'data' => $contact,
            'message' => 'Contact updated successfully'
        ]);
    }
}
