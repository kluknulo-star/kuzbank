<?php

namespace App\Http\Requests\BankDeposit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankDepositRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'nullable|integer|exists:users,id',
            'worker_id' => 'nullable|integer|exists:users,id',
            'type_deposit_id' => 'nullable|integer|exists:type_deposits,id',
            'is_approved' => 'nullable|boolean',
            'amount' => 'nullable|integer',
            'closed_at' => 'nullable|date',
        ];
    }
}
