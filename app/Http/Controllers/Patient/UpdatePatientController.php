<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdatePatientController extends Controller
{
    public function __invoke(UpdatePatientRequest $request, User $user)
    {
        $payload = $request->validated();

        try {
            return DB::transaction(function () use ($payload, $user) {
                $user->update([
                    'name' => data_get($payload, 'name'),
                    'email' => data_get($payload, 'email'),
                ]);
        
                $user->patient()->update(Arr::except($payload, ['name', 'email']));
        
                return response()->json('Paciente atualizado com sucesso!');
            });
        }
        catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
