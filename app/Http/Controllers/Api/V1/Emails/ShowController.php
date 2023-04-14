<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactEmailResource;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{

    public function __invoke(Contact $contact, ContactEmail $email)
    {
        $email = $contact->emails()->find($email);
        return response()->json(
            data: ContactEmailResource::collection($email),
            status: Response::HTTP_OK
        );
    }
}
