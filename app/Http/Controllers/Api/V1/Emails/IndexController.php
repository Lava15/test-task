<?php

namespace App\Http\Controllers\Api\V1\Emails;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactEmailResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $emails = $contact->emails;

        return response()->json(
            data: ContactEmailResource::collection($emails),
            status: Response::HTTP_OK
        );
    }
}
