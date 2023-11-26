<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\RescheduleAppointmentRequest;
use App\Models\Appointment;

class RescheduleAppointmentController extends Controller
{
    public function __invoke(RescheduleAppointmentRequest $request, Appointment $appointment)
    {
        $payload = $request->validated();

        $appointment->update([
            'status' => data_get($payload, 'status'),
            'rescheduled_for' => data_get($payload, 'new_date'),
            'consultation_time' => data_get($payload, 'new_time')
        ]);

        return response()->json('Consulta reagendada com sucesso!');
    }
}