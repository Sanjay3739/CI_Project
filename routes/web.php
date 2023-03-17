<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\admin\CmsPageController;
use App\Http\Controllers\LandingPageController;






use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AppController;
use App\Http\Controllers\admin\MissionThemeController;
use App\Http\Controllers\admin\MissionSkillController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MissionApplicationController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\ForgetPasswordController;
use App\Http\Controllers\Admin\AdminPasswordResetController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\UserEditProfileController;
//frontend Routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('index', function () {
    return view('index');
})->name('index')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout']);
Route::post('custom-login', [AuthController::class, 'postLogin'])->name('login.custom');
Route::get('forgot', function () {
    return view('login.forgot');
})->name('forgot.password');
Route::post('reset', [PasswordResetController::class, 'resetPassword'])->name('check.email');
Route::get('register', function () {
    return view('register.register');
})->name('register');
Route::get('forgot-password/{token}', function ($token) {
    return view('reset', [$token]);
});
Route::post('register', [AuthController::class, 'register'])->name('post-register');
Route::post('password-resetting', [PasswordResetController::class, 'passwordResetting'])->name('password-resetting');
Route::get('index', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('data', [LandingPageController::class, 'filterData']);


//cmspages(privacy and Policy)
Route::get('policy', [CmsPagesController::class, 'index']);

//cmspages(privacy and Policy)
Route::get('policy', [CmsPagesController::class, 'index']);

//User Edit Profile
Route::get('userprofile',[UsereditController::class, 'index']);

//All BACKEND ROUTE  IN HERE

Route::get('admindashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
Route::post('admindashboard', [AdminAuthController::class, 'index'])->name('dashboard');
Route::get('adminlogin', [AdminAuthController::class, 'login'])->name('adminlogin');
Route::post('admincustomlogin', [AdminAuthController::class, 'customLogin'])->name('admincustomlogin');
Route::get('forgetpassword', [ForgetPasswordController::class, 'forgetpassword'])->name('forgetpassword');
Route::post('resetpassword', [ForgetPasswordController::class, 'resetpassword'])->name('resetpassword');
Route::post('admin-check-email', [ForgetPasswordController::class, 'admincheckEmail'])->name('admin.check.email');
Route::get('resetpassword', [ForgetPasswordController::class, 'resetpassword'])->name('resetpassword');
Route::post('resetpassword2', [AdminPasswordResetController::class, 'resetPassword'])->name('resetpassword2');
Route::get('adminresetpage/{token}', function () {
    return view('admin.auth.resetpassword');
});
Route::post('admin-password-resetting', [AdminPasswordResetController::class, 'adminPasswordResetting'])->name('adminPasswordResetting');
Route::resource('/mission', MissionController::class);
Route::resource('/cmspage', CmsPageController::class);




Route::resource('missiontheme', MissionThemeController::class);
Route::resource('missionskill', MissionSkillController::class)->withTrashed();
Route::resource('user', UserController::class)->withTrashed();
