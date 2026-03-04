<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\DB;

Route::get('/debug-db', function () {
    try {
        DB::connection()->getPdo();
        return "Koneksi Aman, Bos!";
    } catch (\Exception $e) {
        return "Gagal karena: " . $e->getMessage();
    }
});

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Google Auth
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// Interaction
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/comment/reaction', [CommentController::class, 'reaction'])->name('comment.reaction');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');

/*
|--------------------------------------------------------------------------
| AUTH (Breeze & Redirect Fix)
|--------------------------------------------------------------------------
*/
// Jembatan: Menangani redirect default Breeze agar tidak error 404/500
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| ADMIN PANEL (Manual Routes)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // === PROFILES (Biodata) ===
        Route::get('/profiles/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
        Route::post('/profiles/edit', [ProfileController::class, 'update'])->name('profiles.update');

        // === PROFILES (Headline) ===
        Route::get('/profiles/headlines', [ProfileController::class, 'headlineIndex'])->name('profiles.headline');
        Route::post('/profiles/headlines', [ProfileController::class, 'headlineStore'])->name('profiles.store');
        Route::put('/profiles/headlines/{headline}', [ProfileController::class, 'headlineUpdate'])->name('profiles.headline.update');
        Route::delete('/profiles/headlines/{headline}', [ProfileController::class, 'headlineDestroy'])->name('profiles.destroy');
        Route::post('/profiles/headlines/reorder', [ProfileController::class, 'headlineReorder'])->name('profiles.reorder');

        // === SKILLS (Manual) ===
        Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
        Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
        Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
        Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
        Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

        // === PROJECTS (Manual) ===
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        // === CERTIFICATIONS (Manual) ===
        Route::get('/certifications', [CertificationController::class, 'index'])->name('certifications.index');
        Route::get('/certifications/create', [CertificationController::class, 'create'])->name('certifications.create');
        Route::post('/certifications', [CertificationController::class, 'store'])->name('certifications.store');
        Route::get('/certifications/{certification}/edit', [CertificationController::class, 'edit'])->name('certifications.edit');
        Route::put('/certifications/{certification}', [CertificationController::class, 'update'])->name('certifications.update');
        Route::delete('/certifications/{certification}', [CertificationController::class, 'destroy'])->name('certifications.destroy');

        Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
    });

require __DIR__ . '/auth.php';
