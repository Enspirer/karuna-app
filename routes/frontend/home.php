<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AizUploadController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\MobileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('receivers', [HomeController::class, 'receivers'])->name('receivers');
Route::get('support', [HomeController::class, 'support'])->name('support');
Route::get('payment', [HomeController::class, 'payment'])->name('payment');
Route::get('campaigns', [HomeController::class, 'campaigns'])->name('campaigns');
Route::get('payment/payment-status', [HomeController::class, 'payment_status'])->name('payment_status');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

// Mobile Routes
Route::get('mobile/splash', [MobileController::class, 'splash'])->name('mobile.splash');
Route::get('mobile/login', [MobileController::class, 'login'])->name('mobile.login');
Route::get('mobile/register', [MobileController::class, 'register'])->name('mobile.register');
Route::get('mobile', [MobileController::class, 'index'])->name('mobile.index');
Route::get('mobile/donation-info', [MobileController::class, 'donation_info'])->name('mobile.donation_info');
Route::get('mobile/donation-list', [MobileController::class, 'donation_list'])->name('mobile.donation_list');
Route::get('mobile/payment', [MobileController::class, 'payment'])->name('mobile.payment');
Route::get('mobile/success', [MobileController::class, 'success'])->name('mobile.success');
Route::get('mobile/profile-menu', [MobileController::class, 'profile_menu'])->name('mobile.profile_menu');
Route::get('mobile/donation', [MobileController::class, 'donation'])->name('mobile.donation');
Route::get('mobile/profile', [MobileController::class, 'profile'])->name('mobile.profile');
Route::get('mobile/donation-history', [MobileController::class, 'donation_history'])->name('mobile.donation_history');
Route::get('mobile/notification', [MobileController::class, 'notification'])->name('mobile.notification');
Route::get('mobile/thanks', [MobileController::class, 'thanks'])->name('mobile.thanks');
Route::get('mobile/receivers-list', [MobileController::class, 'receivers_list'])->name('mobile.receivers_list');
Route::get('mobile/receiver', [MobileController::class, 'receiver'])->name('mobile.receiver');
Route::get('mobile/receiver-request-list', [MobileController::class, 'receiver_request_list'])->name('mobile.receiver_request_list');
Route::get('mobile/receiver-request-approve', [MobileController::class, 'receiver_request_approve'])->name('mobile.receiver_request_approve');
Route::get('mobile/confirmation', [MobileController::class, 'confirmation'])->name('mobile.confirmation');
Route::get('mobile/receiver-edit', [MobileController::class, 'receiver_edit'])->name('mobile.receiver_edit');
Route::get('mobile/view-profile', [MobileController::class, 'view_profile'])->name('mobile.view_profile');

// Dashboard
// Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('dashboard/receiver', [DashboardController::class, 'receiver'])->name('dashboard.receiver');
Route::get('dashboard/receiver-request-list', [DashboardController::class, 'receiver_request_list'])->name('dashboard.receiver_request_list');
Route::get('dashboard/receiver-request', [DashboardController::class, 'receiver_request'])->name('dashboard.receiver_request');
Route::get('dashboard/profile/agent', [DashboardController::class, 'agent_profile'])->name('dashboard.agent_profile');
Route::get('dashboard/notification', [DashboardController::class, 'notification'])->name('dashboard.notification');
Route::get('dashboard/notification/submit', [DashboardController::class, 'notification_submit'])->name('dashboard.notification_submit');
Route::get('dashboard/payment-history', [DashboardController::class, 'payment_history'])->name('dashboard.payment_history');
Route::get('dashboard/donation-complete', [DashboardController::class, 'donation_complete'])->name('dashboard.donation_complete');

Route::post('/aiz-uploader', [AizUploadController::class, 'show_uploader']);
Route::post('/aiz-uploader/upload', [AizUploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [AizUploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [AizUploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [AizUploadController::class, 'attachment_download'])->name('download_attachment');
Route::get('uploads/all/{file_name}',[AizUploadController::class,'get_image_content']);

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::post('create_receiver', [DashboardController::class, 'create_receiver'])->name('create_receiver');
        Route::post('update_agent', [DashboardController::class, 'update_agent'])->name('update_agent');

    });
});
