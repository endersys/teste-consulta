<?php

namespace App\Http\Controllers\Patient;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StorePatientController extends Controller
{
    public function __invoke(StorePatientRequest $request)
    {
        $payload = $request->validated();

        try {
            return DB::transaction(function () use ($payload) {
                $user = User::create([
                    'name' => data_get($payload, 'name'),
                    'email' => data_get($payload, 'email'),
                    'user_type' => UserTypeEnum::PATIENT
                ]);
        
                $user->patient()->create(Arr::except($payload, ['name', 'email']));
        
                return response()->json('Paciente cadastrado com sucesso!');
            });
        }
        catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
