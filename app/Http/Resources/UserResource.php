<?php

namespace App\Http\Resources;

use App\Enums\UserTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            $this->merge(
                $this->user_type === UserTypeEnum::PATIENT
                    ?
                    new PatientResource($this->patient)
                    :
                    new DoctorResource($this->doctor)
            )
        ];
    }
}
