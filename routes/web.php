<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\admin\CmsPageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MissionDetailController;






use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StoryController;
use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\MissionThemeController;
use App\Http\Controllers\admin\MissionSkillController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\MissionApplicationController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\ForgetPasswordController;
use App\Http\Controllers\Admin\AdminPasswordResetController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\ShareStoryController;
use App\Http\Controllers\StoryDetailController;
use App\Http\Controllers\StoryListingController;
use App\Http\Controllers\TimeSheetsController;
use App\Http\Controllers\UserEditProfileController;


//frontend Routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('index', function () {return view('index');})->name('index')->middleware('auth');
Route::get('index', function () {return view('index');})->name('index')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout']);
Route::post('custom-login', [AuthController::class, 'postLogin'])->name('login.custom');
Route::get('forgot', function () {return view('login.forgot');})->name('forgot.password');
Route::get('forgot', function () {return view('login.forgot');})->name('forgot.password');
Route::post('reset', [PasswordResetController::class, 'resetPassword'])->name('check.email');
Route::get('register', function () { return view('register.register');})->name('register');
Route::get('forgot-password/{token}', function ($token) {return view('reset', [$token]);});
Route::get('register', function () { return view('register.register');})->name('register');
Route::get('forgot-password/{token}', function ($token) {return view('reset', [$token]);});
Route::post('register', [AuthController::class, 'register'])->name('post-register');
Route::post('password-resetting', [PasswordResetController::class, 'passwordResetting'])->name('password-resetting');
Route::get('index',[LandingPageController::class, 'index'])->name('landing.index')->middleware('auth');
Route::post('index',[LandingPageController::class, 'index'])->name('landing.index')->middleware('auth');
Route::get('filter-data',[LandingPageController::class,'filterData']);

// Route::get('policy', [CmsPagesController::class, 'index']);
Route::get('policy', [CmsPagesController::class, 'index'])->name('privacypolicy');
Route::post('update-profile', [UserEditProfileController::class,'updateProfile'])->name('update-profile');
Route::get('edit-profile/{user_id}', [UserEditProfileController::class,'editProfile'])->name('edit-profile')->middleware('auth');
Route::post('logout', [UserEditProfileController::class,'logout'])->name('logout');
Route::resource('timesheet', TimesheetsController::class);
Route::get('sharestory',[ShareStoryController::class, 'index']);
Route::resource('stories', ShareStoryController::class);
Route::get('storylisting',[StoryListingController::class, 'index']);
Route::get('storydetails',[StoryDetailController::class, 'storydetails']);







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
Route::get('adminresetpage/{token}', function () { return view('admin.auth.resetpassword');});
Route::post('admin-password-resetting', [AdminPasswordResetController::class, 'adminPasswordResetting'])->name('adminPasswordResetting');
Route::resource('/mission', MissionController::class);
Route::resource('/cmspage', CmsPageController::class);
Route::resource('missiontheme', MissionThemeController::class);
Route::resource('missionskill', MissionSkillController::class)->withTrashed();
Route::resource('user', UserController::class)->withTrashed();
Route::resource('story', StoryController::class);
Route::get('approve/{story_id}', [StoryController::class, 'approve']);
Route::get('decline/{story_id}', [StoryController::class, 'decline']);
Route::get('admin/banner',[BannerController::class, 'banner'])->name('banner');
Route::get('admin/add_banner',[BannerController::class, 'add_banner']);
Route::get('admin/edit_banner/{banner_id}',[BannerController::class, 'edit_banner']);
Route::post('admin/banner',[BannerController::class, 'banner']);
Route::post('add-banner', [BannerController::class, 'banner_add'])->name('banner.add');
Route::post('edit-banner', [BannerController::class, 'banner_edit'])->name('banner.edit');
Route::delete('admin/delete_banner/{banner_id}',[BannerController::class, 'destroy'])->name('banner.destroy');
Route::resource('application', ApplicationController::class);
Route::get('approve_app/{mission_application_id}', [ApplicationController::class, 'approve_app']);
Route::get('decline_app/{mission_application_id}', [ApplicationController::class, 'decline_app']);
Route::get('mission-page/{mission_id}',[MissionDetailController::class,'main'])->name('mission-page');
