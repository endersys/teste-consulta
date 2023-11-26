<?php

use App\Http\Controllers\Appointment\DeleteAppointmentController;
use App\Http\Controllers\Appointment\FinishAppointmentController;
use App\Http\Controllers\Appointment\GetAppointmentsController;
use App\Http\Controllers\Appointment\RescheduleAppointmentController;
use App\Http\Controllers\Appointment\ShowAppointmentController;
use App\Http\Controllers\Appointment\StoreAppointmentController;
use App\Http\Controllers\Appointment\UpdateAppointmentController;
use App\Http\Controllers\Doctor\DeleteDoctorController;
use App\Http\Controllers\Doctor\GetDoctorsController;
use App\Http\Controllers\Doctor\ShowDoctorController;
use App\Http\Controllers\Patient\GetPatientsController;
use App\Http\Controllers\Doctor\StoreDoctorController;
use App\Http\Controllers\Doctor\UpdateDoctorController;
use App\Http\Controllers\Patient\DeletePatientController;
use App\Http\Controllers\Patient\ShowPatientController;
use App\Http\Controllers\Patient\StorePatientController;
use App\Http\Controllers\Patient\UpdatePatientController;
use Illuminate\Support\Facades\Route;

Route::prefix('doctors')->group(function () {
    Route::post('', StoreDoctorController::class);
    Route::get('', GetDoctorsController::class);
    Route::get('{user}', ShowDoctorController::class);
    Route::patch('{user}', UpdateDoctorController::class);
    Route::delete('{user}', DeleteDoctorController::class);
});

Route::prefix('patients')->group(function () {
    Route::post('', StorePatientController::class);
    Route::get('', GetPatientsController::class);
    Route::patch('{user}', UpdatePatientController::class);
    Route::get('{user}', ShowPatientController::class);
    Route::delete('{user}', DeletePatientController::class);
});

Route::prefix('appointments')->group(function () {
    Route::post('', StoreAppointmentController::class);
    Route::get('{appointment}', ShowAppointmentController::class);
    Route::patch('{appointment}', UpdateAppointmentController::class);
    Route::get('', GetAppointmentsController::class);
    Route::delete('{appointment}', DeleteAppointmentController::class);
    Route::patch('{appointment}/finish', FinishAppointmentController::class);
    Route::patch('{appointment}/reschedule', RescheduleAppointmentController::class);
});