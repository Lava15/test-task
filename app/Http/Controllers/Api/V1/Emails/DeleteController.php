<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends Controller
{
    public function __invoke(Contact $contact, ContactEmail $email): JsonResponse
    {
        $email = $contact->emails()->find($email);
        $email->each->delete();

        return response()->json(
            data: ['message' => 'Email deleted successfully'],
            status: Response::HTTP_NO_CONTENT
        );
    }
}
