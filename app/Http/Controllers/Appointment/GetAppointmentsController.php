<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class GetAppointmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $appointments = Appointment::query()
            ->with('patient', 'doctor')
            ->paginate($request->query('perPage') ?? 10);
        
        return AppointmentResource::collection($appointments);
    }
}
