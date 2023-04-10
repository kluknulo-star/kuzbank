<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'bank_branch_id' => $this->bank_branch_id,
            'bonus_rate_id' => $this->bonus_rate_id,
            'passport_info' => $this->passport_info,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ];
    }
}
