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
use Illuminate\Support\Facades\Route;





Route::get('/admin', [LoginController::class, 'index'])->name('admin.login');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('admin.doctor');
Route::get('/admin/landingpage', [LandingPageController::class, 'index'])->name('admin.landingpage');
Route::get('/admin/password', [PasswordController::class, 'index'])->name('admin.password');
Route::get('/admin/confirmpassword', [PasswordController::class, 'show'])->name('admin.confirmPassword');
Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service');



Route::get('/home',[homeController::class, 'index'])->name('user.home');


