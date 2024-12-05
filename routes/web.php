<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', [Jobcontroller::class, 'index']);
Route::get('/jobs/create', [Jobcontroller::class, 'create']);
Route::get('/job/{job}', [Jobcontroller::class, 'show']);
Route::get('/job/{job}/edit', [Jobcontroller::class, 'edit']);
Route::post('/jobs', [Jobcontroller::class, 'store']);
Route::patch('/job/{job}',[Jobcontroller::class, 'update']);
Route::delete('job/{job}', [Jobcontroller::class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});
