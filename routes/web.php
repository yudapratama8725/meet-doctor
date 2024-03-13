<?php

use Illuminate\Support\Facades\Route;

//Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

//Backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' =>['auth:sanctum', 'verified']],function () {
    
    //appointment page
    Route::resource('appointment', AppointmentController::class);

    //payment page
    Route::resource('payment', PaymentController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' =>['auth:sanctum', 'verified']],function () {
    
    //Dashbaord Admin page
    Route::resource('dashboard', DashboardController::class);

    //Permission
    Route::resource('permission', PermissionController::class);

    //Role
    Route::resource('role', RoleController::class);

    //User
    Route::resource('user', UserController::class);

    //Type User page
    Route::resource('type_user', TypeUserController::class);

    //Specialist page
    Route::resource('specialist', SpecialistController::class);

    //Configpayment page
    Route::resource('config_payment', ConfigPaymentController::class);

    //Consultaion page
    Route::resource('consultation', ConsultationController::class);

    //Doctor page
    Route::resource('doctor', DoctorController::class);

    //Hospital Pantient page
    Route::resource('hospital_patient', HospitalPatientController::class);

    //Appointment page
    Route::resource('appointment', ReportAppointmentController::class);

    //Transaction page
    Route::resource('transaction', ReportTransactionController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
