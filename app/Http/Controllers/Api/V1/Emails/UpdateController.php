<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactEmailRequest;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(ContactEmailRequest $request, Contact $contact, ContactEmail $email)
    {
        $email = $contact->emails()->find($email);

        $email->query()->update($request->validated());

        return response()->json(
            data: ['data' => $email, 'message' => 'Email updated successfully'],
            status: Response::HTTP_CREATED
        );
    }
}
