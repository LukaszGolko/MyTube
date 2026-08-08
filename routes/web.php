<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

use App\Http\Controllers\Studio\StudioPanelController;



Route::domain(config('app.studio_domain'))
    ->middleware(['auth', 'verified'])
    ->name('studio.')
    ->group(function () {
        Route::get('/panel', [StudioPanelController::class, 'panel'])->name('panel');
    });

Route::domain(config('app.home_domain'))
    ->name('home.')
    ->group(function () {

        Route::get('/', function () {
            return Inertia::render('welcome', [
                'canRegister' => Features::enabled(Features::registration()),
            ]);
        })->name('home');

        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('dashboard', function () {
                return Inertia::render('dashboard');
            })->name('dashboard');
        });
    });


Route::get('/main', function () {
    return Inertia::render('main');
})->name('main');

require __DIR__ . '/settings.php';
