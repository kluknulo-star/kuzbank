<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'nullable|email',
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'bank_branch_id' => 'nullable|integer',
            'bonus_rate_id' => 'nullable|integer',
            'passport_info' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
            'role_id' => 'nullable|integer',
        ];
    }
}
