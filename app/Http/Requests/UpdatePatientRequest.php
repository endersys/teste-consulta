<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
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
            'gender' => 'required|string',
            'cid' => 'required',
            'birthdate' => 'nullable|date',
            'street' => 'nullable',
            'neighborhood' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'phone_number' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'gender.required' => 'O gênero é obrigatório.',
            'gender.string' => 'Gênero inválido.',
            'email.email' => 'Email inválido.',
            'email.unique' => 'Email já cadastrado.',
            'cid.required' => 'O cid é obrigatório.'
        ];
    }
}
