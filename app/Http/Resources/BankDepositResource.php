<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankDepositResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'client_id' => $this->client_id,
            'worker_id' => $this->worker_id,
            'type_deposit_id' => $this->type_deposit_id,
            'is_approved' => $this->is_approved,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'closed_at' => $this->closed_at,
        ];
    }
}
