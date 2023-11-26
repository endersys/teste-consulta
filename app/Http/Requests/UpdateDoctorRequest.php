<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => ['nullable', Rule::unique('users')->ignore($this->user)],
            'crm' => 'required',
            'specialty' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'crm.required' => 'O CRM é obrigatório.'
        ];
    }
}
