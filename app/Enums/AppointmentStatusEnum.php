<?php

namespace App\Enums;

enum AppointmentStatusEnum: string {
    case PENDING = 'pending';
    case RESCHEDULED = 'rescheduled';
    case DONE = 'done';

    public function label(): string
    {
        return match($this) 
        {
            self::PENDING => 'Pendente',
            self::RESCHEDULED => 'Reagendado',
            self::DONE => 'Concluído'
        };
    }

    public static function values() {
        return array_column(self::cases(), 'value');
    }
}