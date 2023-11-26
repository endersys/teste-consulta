<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\User;

class DeletePatientController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();

        return response()->json('Paciente removido com sucesso!');
    }
}