<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Order routes
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', \App\Livewire\OrdersComponent::class)->name('index');
    });

    // History routes
    Route::prefix('history')->name('history.')->group(function () {
        Route::get('/', \App\Livewire\HistoryComponent::class)->name('index');
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Group routes for Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', \App\Livewire\User\UsersComponent::class)->name('index');
        Route::get('/add', \App\Livewire\User\AddUserComponent::class)->name('add');
        Route::get('/edit/{userId}', \App\Livewire\User\EditUserComponent::class)->name('edit');
    });


    // Group routes for Services
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', \App\Livewire\Service\ServicesComponent::class)->name('index');
        Route::get('/add', \App\Livewire\Service\AddServiceComponent::class)->name('add');
        Route::get('/edit/{serviceId}', \App\Livewire\Service\EditServiceComponent::class)->name('edit');
    });

    // Group routes for Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', \App\Livewire\Transaction\TransactionComponent::class)->name('index');
    });
})->middleware(AdminMiddleware::class);
