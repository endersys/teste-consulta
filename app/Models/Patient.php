<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => ServerStatus::class,
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function appointments(): HasMany {
        return $this->hasMany(Appointment::class, 'patient_id', 'user_id');
    }
}