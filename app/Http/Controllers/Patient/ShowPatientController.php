<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class ShowPatientController extends Controller
{
    public function __invoke(User $user)
    {
        return new UserResource($user);
    }
}