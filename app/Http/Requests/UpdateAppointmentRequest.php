<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'clinic' => 'nullable|string',
            'consultation_date' => 'required|date',
            'consultation_time' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'doctor_id.required' => 'É obrigatório informar um médico.',
            'patient_id.required' => 'É obrigatório informar um médico.',
            'clinic.string' => 'Clínica inválida.',
            'consultation_date.required' => 'A data da consulta é obrigatória.',
            'consultation_date.date' => 'A data da consulta deve ser uma data válida.',
            'consultation_time.required' => 'O horário da consulta é obrigatório.'
        ];
    }
}
