<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\public\homeController;
use App\Http\Controllers\public\PublicBlogController;
use App\Http\Controllers\public\PublicDoctorController;
use App\Http\Controllers\public\PublicServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Middleware\CustomAuthRedirect;
use App\Http\Middleware\admin;
use App\Models\kontak;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;





// login&logout

Route::controller(LoginController::class)->group(function () {
  Route::get('/admin', 'showLoginForm')->name('admin.login');
  Route::post('/admin/login', 'login')->name('admin.login.post');
  
});

Route::middleware([CustomAuthRedirect::class])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [LoginController::class,'logout'])->name('admin.logout');
    Route::get('/admin/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.forgotPassword');
});

Route::middleware([CustomAuthRedirect::class, admin::class])->group(function () {
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
    Route::post('/admin/contact/edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');

    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::post('/admin/blog/store', action: [BlogController::class, 'store'])->name('admin.blog.store');
    Route::put('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');

    Route::get('/admin/doctor', [JadwalDokterController::class, 'index'])->name('admin.doctor');
    // Route::post('/admin/doctor/store', [DoctorController::class, 'store'])->name('admin.doctor.store');
    Route::post('/admin/doctor/store', [JadwalDokterController::class, 'store'])->name('admin.doctor.store');
    Route::put('/admin/doctor/update/{id}', [JadwalDokterController::class, 'update'])->name('admin.doctor.update');
    Route::delete('/admin/doctor/destroy/{id}', [JadwalDokterController::class, 'destroy'])->name('admin.doctor.destroy');

    
    Route::get('/admin/landingpage', [LandingPageController::class, 'index'])->name('admin.landingpage');
    Route::post('/admin/landingpage/store', [LandingPageController::class, 'store'])->name('admin.landingpage.store');
    Route::post('/admin/landingpage/edit/{id}', [LandingPageController::class, 'edit'])->name('admin.landingpage.update');
    Route::delete('/admin/landingpage/destroy/{id}', [LandingPageController::class, 'destroy'])->name('admin.landingpage.destroy');

    Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service');
    Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');    
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('/admin/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    Route::get('/admin/change-password', [PasswordController::class, 'index'])->name('password.change');
    Route::post('/admin/validate-current-password', [PasswordController::class, 'validateCurrentPassword'])->name('password.validate');
    Route::get('/admin/reset-password', [PasswordController::class, 'showResetForm'])->name('admin.Reset_Password');
    Route::post('/admin/update-password', [PasswordController::class, 'update'])->name('password.update');
});


Route::get('admin/password/reset', [ForgotPasswordController::class, 'index'])->name('admin.password.request');
Route::get('admin/password/reset/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

Route::post('admin/password/reset/form', [ForgotPasswordController::class, 'verify_token'])->name('admin.password.request.verify');
Route::get('admin/password/reset/password', [ForgotPasswordController::class, 'passwordform'])->name('admin.password.reset.form');

Route::post('admin/password/reset/password/update', [ForgotPasswordController::class, 'resetPassword'])->name('admin.password.reset');





// Rute Layanan
// // Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('admin.forgotPassword');
// Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
// Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');



// Route::get('/', '');
Route::get('/',[homeController::class, 'index'])->name('home');

Route::get('/location', function () {
  $contacts = kontak::all(); // Mengambil semua data dari model Kontak
  return view('user.maps', compact('contacts')); // Mengirim data ke view
})->name('location');

Route::get('/layananGigiAnak', [PublicServiceController::class, 'childService'])->name('service.child');
Route::get('/layananGigiDewasa', [PublicServiceController::class, 'adultService'])->name('service.adult');

Route::get('/pelayanan/{id}', [PublicServiceController::class, 'show'])->name('service.show');

Route::get('/blog',[PublicBlogController::class, 'index'])->name('blog');
Route::get('/artikel/{id}',[PublicBlogController::class, 'show'])->name('blog.show');
Route::get('/jadwal',[PublicDoctorController::class, 'index'])->name('schedule');
Route::get('/jadwal/cekJadwal',[PublicDoctorController::class, 'getSchedule'])->name('schedule.search');

