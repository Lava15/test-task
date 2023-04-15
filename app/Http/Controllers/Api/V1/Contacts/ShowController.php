<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $contact = Contact::query()->find($contact)->load(['emails', 'phoneNumbers']);

        return response()->json(['data' => ContactResource::collection($contact)]);
    }
}
