<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class ShowDoctorController extends Controller
{
    public function __invoke(User $user)
    {
        return new UserResource($user);
    }
}