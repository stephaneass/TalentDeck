<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Livewire\LoginComponent;
use App\Livewire\RegisterComponent;
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
Route::get('/login', [LoginController::class, 'login_form'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.check');
Route::get('/registration', [RegisterController::class, 'register_form'])->name('register');
Route::post('/registration', [RegisterController::class, 'register'])->name('register.check');
//Route::get('/login', LoginComponent::class)->name('login');
//Route::get('/registration', RegisterComponent::class)->name('register');