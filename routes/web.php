<?php

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
Route::get('/login', LoginComponent::class)->name('admin.login');
Route::get('/registration', RegisterComponent::class)->name('admin.register');