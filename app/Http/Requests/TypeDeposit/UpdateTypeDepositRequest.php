<?php

namespace App\Http\Requests\TypeDeposit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeDepositRequest extends FormRequest
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
            'title' => 'nullable|string',
            'percent' => 'nullable|integer',
            'duration_month' => 'nullable|integer',
        ];
    }
}
