<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class DeleteAppointmentController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json('Consulta removida com sucesso');
    }
}
