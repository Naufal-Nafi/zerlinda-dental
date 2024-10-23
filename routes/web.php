<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;





Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']) ->name('admin.login.post');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('admin.doctor');
Route::get('/admin/landingpage', [LandingPageController::class, 'index'])->name('admin.landingpage');
Route::get('/admin/password', [PasswordController::class, 'index'])->name('admin.password');
Route::post('/admin/password/update', [PasswordController::class, 'update'])->name('admin.password.update');
Route::get('/admin/confirmpassword', [PasswordController::class, 'show'])->name('admin.confirmPassword');

// Rute Layanan
Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service');



Route::get('/admin/logout',[LoginController::class, 'logout'])->name('admin.logout');

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Rute untuk mengubah password pengguna




Route::get('/home',[homeController::class, 'index'])->name('user.home');


