<?php

namespace App\Http\Controllers\Doctor;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreDoctorController extends Controller
{
    public function __invoke(StoreDoctorRequest $request)
    {
        $payload = $request->validated();

        try {
            return DB::transaction(function () use ($payload) {
                $user = User::create([
                    'name' => data_get($payload, 'name'),
                    'email' => data_get($payload, 'email'),
                    'user_type' => UserTypeEnum::DOCTOR
                ]);
        
                $user->doctor()->create(Arr::except($payload, ['name', 'email']));
        
                return response()->json('Médico cadastrado com sucesso!');
            });
        }
        catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}