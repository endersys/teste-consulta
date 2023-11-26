<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class FinishAppointmentController extends Controller
{
    public function __invoke(Request $request, Appointment $appointment)
    {
        $status = $request->status;

        if ($status !== 'done') {
            throw new \Exception('Tipo de status inválido!');
        }

        $appointment->update(['status' => $status]);

        return response()->json('Consulta finalizada com sucesso!');
    }
}