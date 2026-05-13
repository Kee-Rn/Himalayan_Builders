<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/portfolio', function () {
    return view('portfolio'); // create resources/views/portfolio.blade.php later
})->name('portfolio.index');

Route::get('/about', function () {
    return view('about'); // create resources/views/about.blade.php later
})->name('about.index');

Route::get('/services', function () {
    return view('services');
})->name('services.index');

Route::get('/projects', function () {
    return view('projects');
})->name('projects.index');

Route::get('/insights', function () {
    return view('insights');
})->name('insights.index');