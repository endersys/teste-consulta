<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;

class ShowAppointmentController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }
}
