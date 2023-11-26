<?php

namespace App\Models;

use App\Enums\AppointmentStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => AppointmentStatusEnum::class,
    ];

    public function doctor(): BelongsTo {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient(): BelongsTo {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function getConsultationDateForHumansAttribute() {
        $date = $this->status === AppointmentStatusEnum::RESCHEDULED ? $this->rescheduled_for : $this->consultation_date;

        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getFullConsultationDateForHumansAttribute() {
        $date = $this->status === AppointmentStatusEnum::RESCHEDULED ? $this->rescheduled_for : $this->consultation_date;

        return Carbon::parse($date)->format('d/m/Y') . " " . $this->consultation_time;
    }
}
