<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RescheduleAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => 'required|in:rescheduled',
            'new_date' => 'required|date_format:Y-m-d',
            'new_time' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'É obrigatório informar o status.',
            'status.in' => 'O status para reagendamento deve ser igual à (rescheduled).',
            'new_date.required' => 'É obrigatório informar uma data para reagendamento.',
            'new_date.date_format' => 'O formato da data deve ser (YYYY-mm-dd).',
            'new_time.required' => 'É obrigatório informar um horário para reagendamento.',
        ];
    }
}
