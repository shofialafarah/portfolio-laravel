<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificationController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);


/*
|--------------------------------------------------------------------------
| AUTH (breeze)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // === PROFILE (single data, no resource) ===
        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])
            ->name('profile.update');

        // === HEADLINES ===
        Route::resource('headlines', HeadlineController::class)
            ->except(['create', 'show', 'edit']);

        Route::post('/headlines/reorder', [HeadlineController::class, 'reorder'])
            ->name('headlines.reorder');

        // === RESOURCE FULL ===
        Route::resource('skills', SkillController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('certifications', CertificationController::class);
    });

require __DIR__ . '/auth.php';
