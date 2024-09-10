<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivewireTestController;
use App\Http\Controllers\AlpineTestController;

use App\Http\Controllers\EventController;
use Barryvdh\Debugbar\DataCollector\EventCollector;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MyPageController;

Route::get('/', function () {
    return view('calendar');
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

Route::prefix('manager')
->middleware('can:manager-higher')
->group(function(){
    Route::get('events/past', [EventController::class, 'past'])->name('events.past');
    Route::resource('events', EventController::class);
});

Route::middleware('can:user-higher')
->group(function(){
    Route::get('index', function() {
        dd('user');
    });
})

->group(function(){
    Route::get('/dashboard', [ReservationController::class, 'dashboard'])->name('dashboard');
//     Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage.index');
//     Route::get('/mypage/{id}', [MyPageController::class, 'show'])->name('mypage.show');
//     Route::post('/mypage/{id}', [MyPageController::class, 'cancel'])->name('mypage.cancel');
    Route::post('/{id}', [ReservationController::class, 'reserve'])->name('events.reserve');
});


Route::get('/{id}', [ReservationController::class, 'detail'])->name('events.detail');


