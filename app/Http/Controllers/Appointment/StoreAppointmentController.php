<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;

class StoreAppointmentController extends Controller
{
    public function __invoke(StoreAppointmentRequest $request)
    {
        $payload = $request->validated();

        Appointment::create($payload);

        return response()->json('Consulta cadastrada com sucesso!');
    }
}
