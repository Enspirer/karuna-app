<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AizUploadController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\MobileController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\MobileProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');
Route::post('contact_us/store', [ContactController::class, 'store'])->name('contact_us.store');
Route::post('contact_now', [ContactController::class, 'contact_now'])->name('contact_now');


Route::get('help-and-support', [HomeController::class, 'help'])->name('help');
Route::post('help_support/store', [HomeController::class, 'help_support_store'])->name('help_support.store');


// Route::get('receivers', [HomeController::class, 'receivers'])->name('receivers');
Route::get('support', [HomeController::class, 'support'])->name('support');
Route::get('campaigns', [HomeController::class, 'campaigns'])->name('campaigns');
Route::get('about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('events', [HomeController::class, 'events'])->name('events');
Route::get('events/event/{id}', [HomeController::class, 'individual_event'])->name('individual_event');

Route::get('terms_and_conditions', [HomeController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::get('privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('donation-payment',[PaymentController::class,'index'])->name('donation_payment');
Route::post('donation-post-getway',[PaymentController::class,'post_getway'])->name('post_getway');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('profile/donor/{id}', [HomeController::class, 'donor_profile'])->name('donor_profile');
Route::get('profile/agent/{id}', [HomeController::class, 'agent_profile'])->name('agent_profile');
Route::get('profile/receiver/{id}', [HomeController::class, 'receiver_profile'])->name('receiver_profile');


Route::get('payment/{receiver_id}', [HomeController::class, 'payment'])->name('payment');
Route::get('payment_other/{receiver_id}', [HomeController::class, 'payment_other'])->name('payment_other');

Route::get('payment/payment-status', [HomeController::class, 'payment_status'])->name('payment_status');


// Mobile Routes
Route::get('mobile/splash', [MobileController::class, 'splash'])->name('mobile.splash');
Route::get('mobile/login', [MobileController::class, 'login'])->name('mobile.login');
Route::get('mobile/register', [MobileController::class, 'register'])->name('mobile.register');


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
        Route::post('update_receiver', [DashboardController::class, 'update_receiver'])->name('update_receiver');
        Route::post('update_agent', [DashboardController::class, 'update_agent'])->name('update_agent');
        Route::post('update_nic_details', [DashboardController::class, 'update_nic_details'])->name('update_nic_details');
        
        Route::post('receiver_request_update', [DashboardController::class, 'receiver_request_update'])->name('receiver_request_update');
        Route::post('notification/submit/store', [DashboardController::class, 'notification_store'])->name('notification.submit.store');
        Route::post('update_donor_mobile', [MobileProfileController::class, 'update_donor_mobile'])->name('update_donor_mobile');
        Route::post('update_agent_mobile', [MobileProfileController::class, 'update_agent_mobile'])->name('update_agent_mobile');
        Route::post('mobile_receiver_request_update', [MobileController::class, 'mobile_receiver_request_update'])->name('mobile_receiver_request_update');
        

        Route::get('dashboard/receiver/{id}', [DashboardController::class, 'receiver'])->name('dashboard.receiver');
        Route::get('dashboard/receiver-request-list', [DashboardController::class, 'receiver_request_list'])->name('dashboard.receiver_request_list');
        Route::get('dashboard/receiver-request/{id}', [DashboardController::class, 'receiver_request'])->name('dashboard.receiver_request');
        Route::get('dashboard/profile/edit', [DashboardController::class, 'profile_edit'])->name('dashboard.profile_edit');
        Route::get('dashboard/notification', [DashboardController::class, 'notification'])->name('dashboard.notification');
        Route::get('dashboard/notification/submit/{id}', [DashboardController::class, 'notification_submit'])->name('dashboard.notification_submit');
        Route::get('dashboard/payment-history', [DashboardController::class, 'payment_history'])->name('dashboard.payment_history');
        Route::get('dashboard/donation-complete/{receiver_id}', [DashboardController::class, 'donation_complete'])->name('dashboard.donation_complete');
        Route::get('dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
        Route::get('dashboard/help', [DashboardController::class, 'help'])->name('dashboard.help');


        Route::get('mobile', [MobileController::class, 'index'])->name('mobile.index');
        Route::get('mobile/donation-info/{id}', [MobileController::class, 'donation_info'])->name('mobile.donation_info');
        Route::get('mobile/donation-list', [MobileController::class, 'donation_list'])->name('mobile.donation_list');
        Route::get('mobile/payment/{receiver_id}', [MobileController::class, 'payment'])->name('mobile.payment');
        Route::get('mobile/payment_other/{receiver_id}', [MobileController::class, 'payment_other'])->name('mobile.payment_other');
        Route::get('mobile/success/{amount}', [MobileController::class, 'success'])->name('mobile.success');
        Route::get('mobile/profile-menu', [MobileController::class, 'profile_menu'])->name('mobile.profile_menu');
        Route::get('mobile/donation', [MobileController::class, 'donation'])->name('mobile.donation');
        Route::get('mobile/profile', [MobileController::class, 'profile'])->name('mobile.profile');
        Route::get('mobile/donation-history', [MobileController::class, 'donation_history'])->name('mobile.donation_history');
        Route::get('mobile/notification', [MobileController::class, 'notification'])->name('mobile.notification');
        Route::get('mobile/thanks/{id}', [MobileController::class, 'thanks'])->name('mobile.thanks');
        Route::get('mobile/receivers-list', [MobileController::class, 'receivers_list'])->name('mobile.receivers_list');
        Route::get('mobile/receiver', [MobileController::class, 'receiver'])->name('mobile.receiver');
        Route::get('mobile/receiver-agent/{id}', [MobileController::class, 'receiver_agent'])->name('mobile.receiver_agent');
        Route::get('mobile/receiver-request-list', [MobileController::class, 'receiver_request_list'])->name('mobile.receiver_request_list');
        Route::get('mobile/receiver-request-approve/{id}', [MobileController::class, 'receiver_request_approve'])->name('mobile.receiver_request_approve');
        Route::get('mobile/agent-confirmation/{id}', [MobileController::class, 'agent_confirmation'])->name('mobile.agent_confirmation');
        Route::get('mobile/receiver-confirmation', [MobileController::class, 'receiver_confirmation'])->name('mobile.receiver_confirmation');
        Route::get('mobile/receiver-edit', [MobileController::class, 'receiver_edit'])->name('mobile.receiver_edit');
        Route::get('mobile/receiver-edit-agent/{id}', [MobileController::class, 'receiver_edit_agent'])->name('mobile.receiver_edit_agent');
        Route::get('mobile/view-profile-agent/{id}', [MobileController::class, 'view_profile_agent'])->name('mobile.view_profile');
        Route::get('mobile/view-profile-donor', [MobileController::class, 'view_profile_donor'])->name('mobile.view_profile_donor');
        Route::get('mobile/view-profile-receiver/{id}', [MobileController::class, 'view_profile_receiver'])->name('mobile.view_profile_receiver');
        Route::get('mobile/help', [MobileController::class, 'help'])->name('mobile.help');
        Route::get('mobile/events', [MobileController::class, 'events'])->name('mobile.events');
        Route::get('mobile/events/event/{id}', [MobileController::class, 'individual_event'])->name('mobile.individual_event');
        
    });
});
