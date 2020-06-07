<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/courses', function () {
    return view('courses');
})->name('courses');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/alumni', function () {
    return view('alumni');
})->name('alumni');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/single-post', function () {
    return view('single-post');
})->name('single-post');

Route::get('/single-event', function () {
    return view('single-event');
})->name('single-event');

