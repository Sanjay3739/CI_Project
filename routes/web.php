<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissionDetailController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\VolunteeringTimesheetController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\ShareStoryController;
use App\Http\Controllers\StoryDetailController;
use App\Http\Controllers\StoryListingController;
use App\Http\Controllers\TimeSheetsController;
use App\Http\Controllers\UserEditProfileController;
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
use App\Http\Controllers\admin\CmsPageController;
use App\Http\Controllers\policyController;

//frontend Routes//

Route::get('index', function () {
    return view('index');
})->name('index')->middleware('auth');
Route::get('login-policy', [policyController::class, 'policy'])->name('login-policy');
//admin-routes-no any middleware

// Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth');
// Route::get('/', 'AuthController@index')->name('login');
// Route::get('postregister', 'AuthController@postregister')->name('postregister');
// Route::get('logout', 'AuthController@logout');
// Route::post('custom-login', 'authcontroller@custom-login')->name('login.custom');
// Route::post('register', 'AuthController@register')->name('register');
// Route::post('reset', 'passwordresetcontroller@resetpassword')->name('check.email');
// Route::get('forgot', 'passwordresetcontroller@postforgot')->name('forgot.password');
// Route::get('forgot-password/{token}', 'PasswordResetController@postreset');
// Route::post('password-resetting', 'PasswordResetController@passwordResetting')->name('password-resetting');
// Route::get('download/{filename}', 'DownloadController@download');
// Route::get('mission-page/{mission_id} ', 'MissionDetailController@main')->name('mission-page');
// Route::get('index', 'landingpagecontroller@index')->name('main.index')->middleware('auth');
// Route::get('index-filter', 'landingpagecontroller@filterapply')->name('landing.filterapply')->middleware('auth');
// Route::get('index/find-city', 'LandingPageController@findCity');
// Route::get('index/find-theme', 'LandingPageController@findTheme');
// Route::get('index/find-skill', 'LandingPageController@findSkill');
// Route::get('filter-data', 'LandingPageController@filterData');

// //backend route
// Route::resource('application', ApplicationController::class);
// Route::resource('missiontheme', MissionThemeController::class)->withTrashed();
// Route::resource('missionskill', MissionSkillController::class)->withTrashed();
// Route::resource('user', UserController::class)->withTrashed();
// Route::resource('story', StoryController::class);
// Route::get('approve/{story_id}', 'StoryController@approve');
// Route::get('decline/{story_id}', 'StoryController@decline');
// Route::get('admin/banner', 'BannerController@banner')->name('banner');
// Route::get('admin/add_banner', 'BannerController@add_banner');
// Route::get('admin/edit_banner/{banner_id}', 'BannerController@edit_banner');
// Route::get('admin/banner', 'BannerController@banner');
// Route::get('add-banner', 'bannercontroller@banner_add')->name('banner.add');
// Route::get('edit-banner', 'bannercontroller@banner_edit')->name('banner.edit');
// Route::get('admin/delete_banner/{banner_id}', 'bannercontroller@destroy')->name('banner.destroy');
// Route::get('approve_app/{mission_application_id}', 'ApplicationController@approve_app');
// Route::get('decline_app/{mission_application_id}', 'ApplicationController@decline_app');
// Route::get('policy', [CmsPagesController::class, 'index']);






//admin-routes-no any middleware
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
//admin-routes-no any middleware


//user-routes-no any middleware
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('custom-login', [AuthController::class, 'postLogin'])->name('login.custom');
Route::get('forgot-password/{token}', [PasswordResetController::class, 'postreset']);
Route::get('forgot', [PasswordResetController::class, 'postforgot'])->name('forgot.password');
Route::post('reset', [PasswordResetController::class, 'resetPassword'])->name('check.email');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('postregister', [AuthController::class, 'postregister'])->name('postregister');
Route::get('logout', [AuthController::class, 'logout']);
Route::post('password-resetting', [PasswordResetController::class, 'passwordResetting'])->name('password-resetting');
//user-routes-no any middleware



//user-route
Route::resource('timesheet', VolunteeringTimesheetController::class);
Route::get('storydetails', [StoryDetailController::class, 'storydetails']);
Route::resource('timesheet', TimesheetsController::class);
Route::get('policy', [CmsPagesController::class, 'index'])->name('privacypolicy');
Route::post('update-profile', [UserEditProfileController::class, 'updateProfile'])->name('update-profile');
Route::get('edit-profile/{user_id}', [UserEditProfileController::class, 'editProfile'])->name('edit-profile')->middleware('auth');
Route::post('logout', [UserEditProfileController::class, 'logout'])->name('logout');
// Route::get('storylisting', [StoryListingController::class, 'index']);
Route::get('storylisting', [StoryListingController::class, 'index'])->name('storylisting');
Route::get('storydetail/{story_id}', [StoryDetailController::class, 'storydetails'])->name('storydetail');
Route::post('stories/{story_id}', [ShareStoryController::class, 'updatedstory'])->name('stories.updatedstory');
Route::get('sharestory', [ShareStoryController::class, 'index']);
Route::resource('stories', ShareStoryController::class);
Route::get('download/{filename}', [DownloadController::class, 'download']);
Route::get('mission-page/{mission_id}', [MissionDetailController::class, 'main'])->name('mission-page');
Route::get('index', [HomeController::class, 'index'])->name('main.index')->middleware('auth');
Route::get('index-filter', [HomeController::class, 'filterApply'])->name('landing.filterApply')->middleware('auth');
Route::get('index/find-city', [HomeController::class, 'findCity']);
Route::get('index/find-theme', [HomeController::class, 'findTheme']);
Route::get('index/find-skill', [HomeController::class, 'findSkill']);
Route::get('filter-data', [HomeController::class, 'filterData']);
//user-route



//admin-route
Route::group(['middleware' => [ 'admin']], function () {
    Route::get('admindashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::post('admindashboard', [AdminAuthController::class, 'index'])->name('dashboard');
    Route::get('approve/{story_id}', [StoryController::class, 'approve']);
    Route::get('decline/{story_id}', [StoryController::class, 'decline']);
    Route::get('admin/banner', [BannerController::class, 'banner'])->name('banner');
    Route::get('admin/add_banner', [BannerController::class, 'add_banner']);
    Route::get('admin/edit_banner/{banner_id}', [BannerController::class, 'edit_banner']);
    Route::post('admin/banner', [BannerController::class, 'banner']);
    Route::post('add-banner', [BannerController::class, 'banner_add'])->name('banner.add');
    Route::post('edit-banner', [BannerController::class, 'banner_edit'])->name('banner.edit');
    Route::delete('admin/delete_banner/{banner_id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    Route::get('approve_app/{mission_application_id}', [ApplicationController::class, 'approve_app']);
    Route::get('decline_app/{mission_application_id}', [ApplicationController::class, 'decline_app']);
    Route::get('admin-mission-application', [MissionApplicationController::class, 'index']); //take the appilication
    Route::resource('application', ApplicationController::class);
    Route::resource('missiontheme', MissionThemeController::class);
    Route::resource('missionskill', MissionSkillController::class);
    Route::resource('user', UserController::class);
    Route::resource('story', StoryController::class);
    Route::resource('/mission', MissionController::class);
    Route::resource('/cmspage', CmsPageController::class);
});
//admin-route
