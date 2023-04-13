<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($keyWord)
    {
        $contacts = Contact::where('full_name', 'like', '%' . $keyWord . '%')
            ->orWhereHas('phoneNumbers', function ($query) use ($keyWord) {
                $query->where('number', 'like', '%' . $keyWord . '%');
            })
            ->orWhereHas('emails', function ($query) use ($keyWord) {
                $query->where('email', 'like', '%' . $keyWord . '%');
            })
            ->get();

        return response()->json($contacts);
    }
}
