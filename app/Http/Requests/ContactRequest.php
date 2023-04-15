<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'full_name' => ['required', 'string', 'min:5', 'max:255'],
            'birthday' => ['required', 'date:d/m/Y'],
        ];
    }
}
