<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('testboostrap');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/dashboard', function(){
    return view('homepage');
});

Route::middleware('auth')->group(function () {
    Route::resource('santri', App\Http\Controllers\SantriController::class);
    Route::resource('mapel', App\Http\Controllers\MapelController::class);
    Route::resource('filterair', App\Http\Controllers\FilterAirController::class);
});
