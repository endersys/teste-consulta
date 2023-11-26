<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeleteDoctorController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();

        return response()->json('Médico removido com sucesso!');
    }
}