<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'welcome');
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/job/{job}', 'show')->middleware('auth');

    Route::get('/job/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job');

    Route::post('/jobs', 'store');
    Route::patch('/job/{job}','update');
    Route::delete('job/{job}', 'destroy');
});

//Route::resource('jobs', JobController::class);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
