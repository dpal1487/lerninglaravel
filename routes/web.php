<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(AgentController::class)->group(function () {
        Route::prefix('agents')->group(function () {
            Route::get('/' , 'index')->name('agents.index');
            Route::get('/create' , 'create')->name('agents.create');
            Route::post('/post' , 'store')->name('agents.store');
            Route::get('{id}/edit' , 'edit')->name('agents.edit');
            Route::post('{id}/update' , 'update')->name('agents.update');
            Route::delete('{id}/delete', 'destroy')->name('agents.delete');
        });
    });



    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/' , 'index')->name('user.index');
            Route::get('/create' , 'create')->name('user.create');
            Route::post('/post' , 'store')->name('user.store');
            Route::get('{id}/edit' , 'edit')->name('user.edit');
            Route::post('{id}/update' , 'update')->name('user.update');
            Route::delete('{id}/delete', 'destroy')->name('user.delete');
        });
    });

    Route::get('attendance' , [AttendanceController::class , 'index'])->name('attendance.index');
    Route::get('attendance/{id}' , [AttendanceController::class , 'view'])->name('attendance.view');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
