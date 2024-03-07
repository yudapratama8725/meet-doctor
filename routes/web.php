<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

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
    return view('dashboard');
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
