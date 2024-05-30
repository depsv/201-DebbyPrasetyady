<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('users');
    })->name('users');
    Route::get('users/add', function () {
        return view('add-user');
    })->name('add-user');
    Route::get('users/edit/{userId}', function () {
        return view('edit-user');
    })->name('edit-user');


    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/reports', function () {
        return view('reports');
    })->name('reports');
});
