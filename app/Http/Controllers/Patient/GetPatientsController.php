<?php

namespace App\Http\Controllers\Patient;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetPatientsController extends Controller
{
    public function __invoke(Request $request)
    {
        $patients = User::whereUserType(UserTypeEnum::PATIENT)
            ->with('patient.appointments')
            ->paginate($request->query('perPage') ?? 10);

        return UserResource::collection($patients);
    }
}