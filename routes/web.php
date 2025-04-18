<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\NurseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('nurses', NurseController::class);
        Route::get('clinics/{clinic}', ClinicController::class)->name('clinics.show');
    });
});

Route::get('nurse-welcome', function () {
    return (new \App\Notifications\NurseWelcomeNotification(\App\Models\User::first(), rand()))->toMail(\App\Models\User::first());
});
