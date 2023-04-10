<?php

namespace App\Http\Requests\BankDeposit;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankDepositRequest extends FormRequest
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
            'client_id' => 'required|integer|exists:users,id',
            'worker_id' => 'required|integer|exists:users,id',
            'type_deposit_id' => 'required|integer|exists:type_deposits,id',
            'is_approved' => 'nullable|boolean',
            'amount' => 'required|integer',
            'closed_at' => 'required|date',
        ];
    }
}
