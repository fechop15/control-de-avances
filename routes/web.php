<?php

use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'registerView'])->name('register-view');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [PageController::class, 'home'])->name('inicio');
    Route::get('/proyecto/{id}/{id2}', [PageController::class, 'userStory'])->name('historia-de-usuario');
    Route::get('/proyecto/{id}', [PageController::class, 'projet'])->name('proyecto');
    Route::get('/proyectos', [PageController::class, 'projet'])->name('proyectos');

    Route::apiResource('request/user_story', App\Http\Controllers\UserStoryController::class);
    Route::apiResource('request/ticket', App\Http\Controllers\TicketController::class);


});
