
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');

Route::get('/realisations', [ProjectController::class, 'index'])->name('projects');
Route::get('/realisations/{slug}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/robots.txt', function () {
    return response()->view('robots', [], 200)->header('Content-Type', 'text/plain');
});

// Admin Authentication (SANS Breeze)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// Admin protected routes
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Projects
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}', [AdminProjectController::class, 'show'])->name('admin.projects.show');
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Blog
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}', [AdminBlogController::class, 'show'])->name('admin.blog.show');
    Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');

    // Services
    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}', [AdminServiceController::class, 'show'])->name('admin.services.show');
    Route::get('/services/{id}/edit', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [AdminServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Messages
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{id}', [AdminMessageController::class, 'show'])->name('admin.message.show');
    Route::delete('/messages/{id}', [AdminMessageController::class, 'destroy'])->name('admin.message.destroy');
    Route::post('/messages/{id}/read', [AdminMessageController::class, 'markAsRead'])->name('admin.message.mark-read');
    Route::post('/messages/{id}/unread', [AdminMessageController::class, 'markAsUnread'])->name('admin.message.mark-unread');
    Route::post('/messages/bulk-delete', [AdminMessageController::class, 'bulkDelete'])->name('admin.messages.bulk-delete');
    Route::post('/messages/mark-all-read', [AdminMessageController::class, 'markAllAsRead'])->name('admin.messages.mark-all-read');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
});

// Redirection de /login vers /admin/login
Route::get('/login', function () {
    return redirect('/admin/login');
});

