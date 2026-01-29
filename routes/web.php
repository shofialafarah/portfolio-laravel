<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Admin\ProjectController;

//Publik
Route::get('/', [HomeController::class, 'index']);


// dashboard default Breeze (boleh dipakai / nanti bisa dihapus)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ================= ADMIN PANEL =================
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])
            ->name('profile.update');

        Route::get('/headlines', [\App\Http\Controllers\Admin\HeadlineController::class, 'index'])
            ->name('headlines.index');

        Route::post('/headlines', [\App\Http\Controllers\Admin\HeadlineController::class, 'store'])
            ->name('headlines.store');

        Route::put('/headlines/{headline}', [\App\Http\Controllers\Admin\HeadlineController::class, 'update'])
            ->name('headlines.update');

        Route::delete('/headlines/{headline}', [\App\Http\Controllers\Admin\HeadlineController::class, 'destroy'])
            ->name('headlines.destroy');

        Route::post('/headlines/reorder',
            [HeadlineController::class, 'reorder']
        )->name('headlines.reorder');

        Route::resource('skills', SkillController::class);

        Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->middleware('auth');

    });

require __DIR__ . '/auth.php';
