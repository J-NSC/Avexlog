<?php

use Illuminate\Support\Facades\Route;

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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {

    Route::prefix('Adiantamento')->name('advance.')->group(function () {
        Route::view('advance' , 'Advance.index')->name('index');
    });


    Route::prefix('Agendamento')->name('scheduler.')->group(function () {
        Route::view('scheduler' , 'Scheduler.index')->name('index');
    });

    Route::prefix('Usuarios')->name('users.')->group(function () {
        Route::view('user' , 'User.index')->name('index');
    });

});
Route::view('users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
