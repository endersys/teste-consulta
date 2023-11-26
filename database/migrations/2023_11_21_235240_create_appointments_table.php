<?php

use App\Enums\AppointmentStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->references('user_id')->on('doctors');
            $table->foreignId('patient_id')->references('user_id')->on('patients');
            $table->string('clinic')->nullable();
            $table->date('consultation_date');
            $table->string('consultation_time');
            $table->date('rescheduled_for')->nullable();
            $table->enum('status', AppointmentStatusEnum::values())->default(AppointmentStatusEnum::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
