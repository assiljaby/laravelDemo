<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->latest()->simplePaginate(5)
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/job/{job}', function (Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::get('/job/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job
    ]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
   Job::create([
       'title' => request('title'),
       'salary' => request('salary'),
       'employer_id' => 1
   ]);

   return redirect('/jobs');
});

Route::patch('/job/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect("/job/{$job->id}");
});

Route::delete('job/{job}', function (Job $job) {
    $job->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
