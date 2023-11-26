<?php

namespace App\Enums;

enum UserTypeEnum: string {
    case DOCTOR = 'doctor';
    case PATIENT = 'patient';

    public static function values() {
        return array_column(self::cases(), 'value');
    }
}