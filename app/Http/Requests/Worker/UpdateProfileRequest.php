<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'email' => [
                'nullable',
                Rule::unique('users')->ignore(auth()->id(), 'id')
            ]
        ];
    }
}
