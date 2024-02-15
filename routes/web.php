<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Livewire\DashboardComponent;
use App\Livewire\EducationComponent;
use App\Livewire\LoginComponent;
use App\Livewire\RegisterComponent;
use App\Livewire\SkillComponent;
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
Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'login_form'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.check');
    Route::get('/registration', [RegisterController::class, 'register_form'])->name('register');
    Route::post('/registration', [RegisterController::class, 'register'])->name('register.check');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/educations', EducationComponent::class)->name('educations');
    Route::get('/skills', SkillComponent::class)->name('skills');
});

