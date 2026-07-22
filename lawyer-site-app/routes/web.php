<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ArticleAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Middleware\AdminMiddleware;

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/practice-areas', [PageController::class, 'practiceAreas'])->name('practice-areas');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots'])->name('robots');

// Public Articles / Blog Pages
Route::get('/articles', [BlogController::class, 'index'])->name('blog.index');
Route::get('/articles/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Admin CMS Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Protected Routes
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/', [ArticleAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard', [ArticleAdminController::class, 'dashboard'])->name('dashboard');

        // Articles Resource
        Route::resource('articles', ArticleAdminController::class);

        // User Management (Admin Role Only)
        Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
        Route::post('/users', [UserAdminController::class, 'store'])->name('users.store');
        Route::patch('/users/{user}/role', [UserAdminController::class, 'updateRole'])->name('users.update-role');
        Route::delete('/users/{user}', [UserAdminController::class, 'destroy'])->name('users.destroy');
    });
});
