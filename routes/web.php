<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\useres;

// الصفحات العامة
Route::post('/login',[useres::class,"chek"])->name('login.check');
Route::get('/login', [useres::class, 'showLoginForm'])->name('login');

Route::get('/secure-file/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path); // إذا الملفات في storage/app/public

    if (!file_exists($fullPath)) {
        abort(404);
    }

    return response()->file($fullPath); // عرض الملف في المتصفح
})->where('path', '.*')->name('secure.file');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/ratings', [HomeController::class, 'ratings'])->name('ratings.index');

// التقييمات
Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
// Route::post('/rating/delete/{{id}}', [RatingController::class, 'distroy'])->name('ratings.distroy');

// الشكاوى
Route::get('/complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/complaints/show/{id}', [ComplaintController::class, 'show'])->name('show');

// لوحة التحكم (تتطلب تسجيل دخول)
// Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // إدارة التقييمات
    Route::get('/ratings2', [DashboardController::class, 'ratings2'])
        ->name('admin.ratings2.index');

    Route::post('/ratings/{id}/approve', [DashboardController::class, 'approveRating'])
        ->name('admin.ratings.approve');

    Route::get('/ratings/{id}', [DashboardController::class, 'distroy'])
        ->name('admin.ratings.distroy');

    // إدارة الشكاوى
    Route::get('/complaints', [DashboardController::class, 'complaints'])
        ->name('admin.complaints.index');

    Route::post('/complaints/{id}/update', [DashboardController::class, 'updateComplaint'])
        ->name('admin.complaints.update');
// الرد على الشكوى عبر البريد الإلكتروني
Route::post('/complaints/{id}/reply', [DashboardController::class, 'reply'])
    ->name('admin.complaints.reply');

});

// });

// تسجيل الدخول
// Auth::routes();

// فلترة التقييمات (API)
Route::get('/ratings/filter', [HomeController::class, 'filterRatings'])->name('ratings.filter');