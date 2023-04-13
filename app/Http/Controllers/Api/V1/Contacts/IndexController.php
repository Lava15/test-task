<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $contacts = Contact::query()
            ->with(['emails', 'phoneNumbers'])
            ->paginate(10);

        return response()->json(
            data: ContactResource::collection($contacts),
            status: Response::HTTP_OK
        );
    }
}
