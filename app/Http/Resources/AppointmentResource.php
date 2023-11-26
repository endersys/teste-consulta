<?php

namespace App\Http\Resources;

use App\Enums\AppointmentStatusEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'clinic' => $this->clinic,
            'consultation_date' => $this->status === AppointmentStatusEnum::RESCHEDULED ? $this->rescheduled_for : $this->consultation_date,
            'consultation_time' => $this->consultation_time,
            'consultation_date_for_humans' => $this->consultation_date_for_humans,
            'full_consultation_date_for_humans' => $this->full_consultation_date_for_humans,
            'status' => $this->status->value,
            'status_for_humans' => $this->status->label(),
            'patient' => new UserResource($this->patient),
            'doctor' => new UserResource($this->doctor)
        ];
    }
}
