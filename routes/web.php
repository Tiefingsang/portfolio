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
use App\Http\Controllers\PricingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

/* ============================================================
   FRONTEND
   ============================================================ */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');

Route::get('/realisations', [ProjectController::class, 'index'])->name('projects');
Route::get('/realisations/{slug}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/categorie/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:3,1');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');



Route::get('/process', [ProcessController::class, 'index'])->name('process');



Route::get('/tarifs', [PricingController::class, 'index'])->name('pricing');
/* ============================================================
   SEO
   ============================================================ */
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/robots.txt', function () {
    return response()->view('robots', [], 200)->header('Content-Type', 'text/plain');
});



Route::get('/masasugu', function () {
    return view('pages.masasugu');
})->name('masasugu');

// Route::get('/masadigitale', function () {
//     return view('pages.masadigitale');
// })->name('masadigitale');

// Route::get('/reversible', function () {
//     return view('pages.reversible');
// })->name('reversible');



/* ============================================================
   ADMIN — AUTHENTIFICATION
   ============================================================ */
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login.submit')
        ->middleware('throttle:5,1');   // 5 tentatives / minute / IP
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

/* ============================================================
   ADMIN — PROTÉGÉ
   ============================================================ */
Route::prefix('admin')->middleware(['admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    /* ---------- Projects ---------- */
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}', [AdminProjectController::class, 'show'])->name('admin.projects.show');
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');

    /* ---------- Blog ---------- */
    // ⚠️ upload-image EN PREMIER pour éviter tout conflit avec {id}
    Route::post('/blog/upload-image', [AdminBlogController::class, 'uploadImage'])->name('admin.blog.upload-image');

    Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}', [AdminBlogController::class, 'show'])->name('admin.blog.show');
    Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');

    /* ---------- Services ---------- */
    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}', [AdminServiceController::class, 'show'])->name('admin.services.show');
    Route::get('/services/{id}/edit', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [AdminServiceController::class, 'destroy'])->name('admin.services.destroy');

    /* ---------- Messages ---------- */
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{id}', [AdminMessageController::class, 'show'])->name('admin.message.show');
    Route::delete('/messages/{id}', [AdminMessageController::class, 'destroy'])->name('admin.message.destroy');
    Route::post('/messages/{id}/read', [AdminMessageController::class, 'markAsRead'])->name('admin.message.mark-read');
    Route::post('/messages/{id}/unread', [AdminMessageController::class, 'markAsUnread'])->name('admin.message.mark-unread');
    Route::post('/messages/bulk-delete', [AdminMessageController::class, 'bulkDelete'])->name('admin.messages.bulk-delete');
    Route::post('/messages/mark-all-read', [AdminMessageController::class, 'markAllAsRead'])->name('admin.messages.mark-all-read');

    /* ---------- Profile ---------- */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');


    /* ---------- Testimonials ---------- */
    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{id}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{id}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');




    /* ---------- Categories ---------- */
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

});

/* ============================================================
   Redirection /login → /admin/login
   ============================================================ */
Route::get('/login', function () {
    return redirect('/admin/login');
});
