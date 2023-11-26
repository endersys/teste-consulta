<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'gender' => $this->gender,
            'age' => Carbon::parse($this->birthdate)->age,
            'cid' => $this->cid,
            'birthdate' => $this->birthdate,
            'street' => $this->street,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'country' => $this->country,
            'state' => $this->state,
            'phone_number' => $this->phone_number,
            $this->mergeWhen($request->query('appointments'), [
                'appointments' => $this->appointments
            ])
        ];
    }
}
