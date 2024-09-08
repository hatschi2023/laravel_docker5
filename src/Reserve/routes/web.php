<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivewireTestController;
use App\Http\Controllers\AlpineTestController;

use App\Http\Controllers\EventController;
use Barryvdh\Debugbar\DataCollector\EventCollector;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MyPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// livewire-test
Route::controller(LivewireTestController::class)
    ->prefix('livewire-test')->name('livewire-test.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('register', 'register')->name('register');
    });

Route::get('alpine-test/index', [AlpineTestController::class, 'index']);
