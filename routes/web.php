<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\public\AdultServiceController;
use App\Http\Controllers\Public\KidsServiceController;
use App\Http\Controllers\public\PublicBlogController;
use App\Http\Controllers\public\PublicDoctorController;
use App\Http\Controllers\public\PublicServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;




// login&logout
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']) ->name('admin.login.post');
Route::get('/admin/logout',[LoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');

Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog/store', action: [BlogController::class, 'store'])->name('admin.blog.store');
Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
Route::post('/admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');


Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('admin.doctor');
Route::get('/admin/landingpage', [LandingPageController::class, 'index'])->name('admin.landingpage');



Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Rute untuk mengubah password pengguna
Route::get('/admin/change-password', [PasswordController::class, 'index'])->name('password.change');
Route::post('/admin/validate-current-password', [PasswordController::class, 'validateCurrentPassword'])->name('password.validate');
Route::get('/admin/reset-password', [PasswordController::class, 'showResetForm'])->name('admin.Reset_Password');
Route::post('/admin/update-password', [PasswordController::class, 'update'])->name('password.update');

Route::get('/admin/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.forgotPassword');

// Rute Layanan
Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service');
Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
Route::post('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
Route::delete('/admin/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');


Route::get('/admin/logout',[LoginController::class, 'logout'])->name('admin.logout');


Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('admin.forgotPassword');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');




Route::get('/home',[homeController::class, 'index'])->name('home');

Route::view('/location', 'user.maps')->name('location');
Route::get('/layananGigiAnak', [PublicServiceController::class, 'childService'])->name('service.child');
Route::get('/layananGigiDewasa', [PublicServiceController::class, 'adultService'])->name('service.adult');
// Route::get('/services/{type}/{id}', [PublicServiceController::class, 'show'])->name('service.show');

Route::get('/typeServices', [PublicServiceController::class, 'show'])->name('service.show');

// Route::get('/layananAnak', [KidsServiceController::class, 'index']);
// Route::get('/layananDewasa', [AdultServiceController::class, 'index']);

Route::get('/blog',[PublicBlogController::class, 'index'])->name('blog');
Route::get('/showBlog',[PublicBlogController::class, 'show'])->name('blog.show');
Route::get('/jadwal',[PublicDoctorController::class, 'show'])->name('schedule');