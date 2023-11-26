<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateDoctorController extends Controller
{
    public function __invoke(UpdateDoctorRequest $request, User $user)
    {
        $payload = $request->validated();

        try {
            return DB::transaction(function () use ($payload, $user) {
                $user->update([
                    'name' => data_get($payload, 'name'),
                    'email' => data_get($payload, 'email'),
                ]);
        
                $user->doctor()->update(Arr::except($payload, ['name', 'email']));
        
                return response()->json('Médico atualizado com sucesso!');
            });
        }
        catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}