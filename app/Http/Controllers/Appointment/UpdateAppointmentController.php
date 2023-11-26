<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;

class UpdateAppointmentController extends Controller
{
    public function __invoke(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $payload = $request->validated();

        $appointment->update($payload);

        return response()->json('Consulta atualizada com sucesso!');
    }
}
