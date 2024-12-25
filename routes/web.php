<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NeedController;
use App\Http\Controllers\PeopleController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/donasi', [MainController::class, 'donation'])->name('donation');
Route::post('/donasi/store', [MainController::class, 'donate'])->name('donation.store');
Route::get('/events', [MainController::class, 'events'])->name('events');
Route::get('/events/{event:id}', [MainController::class, 'eventShow'])->name('event.show');


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage.index');
    Route::put('/homepage/update', [HomepageController::class, 'update'])->name('homepage.update');


    Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
    Route::get('/donation/getTransfer/{donation:id}', [DonationController::class, 'getTransfer'])->name('donation.getTransfer');

    Route::prefix('people')->name('people.')->group(function () {
        Route::get('/', [PeopleController::class, 'index'])->name('index');
        Route::put('/update', [PeopleController::class, 'update'])->name('update');
    });

    Route::prefix('needs')->name('needs.')->group(function () {
        Route::get('/', [NeedController::class, 'index'])->name('index');
        Route::put('/update', [NeedController::class, 'update'])->name('update');
    });
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::post('/store', [EventController::class, 'store'])->name('store');
        Route::post('/update/{event:id}', [EventController::class, 'update'])->name('update');
        Route::delete('/destroy/{event:id}', [EventController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
