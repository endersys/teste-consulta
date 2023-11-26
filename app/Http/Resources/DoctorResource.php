<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'specialty' => $this->specialty,
            'crm' => $this->crm,
            $this->mergeWhen($request->query('appointments'), [
                'appointments' => $this->appointments
            ])
        ];
    }
}
