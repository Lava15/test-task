<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'contacts',
            'attributes' => [
                'name' => $this->full_name,
                'birthday' => $this->birthday,
            ],
            'relationships' => [
                'phones' => ContactPhoneResource::collection($this->whenLoaded('phoneNumbers')),
                'emails' => ContactEmailResource::collection($this->whenLoaded('emails')),
            ]
        ];
    }
}
