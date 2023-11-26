<?php

namespace App\Http\Controllers\Doctor;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetDoctorsController extends Controller
{
    public function __invoke(Request $request)
    {
        $doctors = User::whereUserType(UserTypeEnum::DOCTOR)
            ->with('doctor.appointments')
            ->paginate($request->query('perPage') ?? 10);

        return UserResource::collection($doctors);
    }
}