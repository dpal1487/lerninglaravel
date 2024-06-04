<?php

use App\Http\Controllers\Admin\UserACL\PermissionController;
use App\Http\Controllers\Admin\UserACL\RoleController;
use App\Http\Controllers\Admin\UserACL\UserController;
use App\Http\Controllers\AgentController;
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
            Route::post('/store' , 'store')->name('agents.store');
            Route::get('{id}/edit' , 'edit')->name('agents.edit');
            Route::post('{id}/update' , 'update')->name('agents.update');
            Route::delete('{id}/delete', 'destroy')->name('agents.delete');
            Route::get('{id}', 'show')->name('agents.show');
        });
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('user' , [UserController::class, 'index'])->name('user.index');
    Route::get('role' , [RoleController::class, 'index'])->name('role.index');
    Route::get('role-view' , [RoleController::class, 'show'])->name('role-view.show');
    Route::get('permissions' , [PermissionController::class, 'index'])->name('permissions');
});

require __DIR__.'/auth.php';
