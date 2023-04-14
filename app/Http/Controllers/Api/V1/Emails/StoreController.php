<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactEmailRequest;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactEmailRequest $request, Contact $contact)
    {
        $email = ContactEmail::query()
            ->create($request->validated());

        return response()->json(
            data: ['data' => $email, 'message' => 'Email created successfully'],
            status: Response::HTTP_CREATED
        );
    }
}
