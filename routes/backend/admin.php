<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ModuleExplorerController;
use App\Http\Controllers\Backend\PackagesController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ListController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\HelpSupportController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\ContactUsersController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('payment',[PaymentController::class, 'index'])->name('payment.index');
Route::get('payment/show/{id}',[PaymentController::class, 'show'])->name('payment.show');
Route::get('payment/delete/{id}',[PaymentController::class, 'delete'])->name('payment.delete');
Route::get('payment/getdetails',[PaymentController::class, 'getDetails'])->name('payment.get_details');



Route::get('file_manager', [FileManagerController::class, 'index'])->name('file_manager.index');
Route::get('file_manager/getdetails', [FileManagerController::class, 'getdetails'])->name('file_manager.getdetails');
Route::get('file_manager/delete/{id}', [FileManagerController::class, 'destroy'])->name('file_manager.destroy');

Route::get('module-explorer', [ModuleExplorerController::class, 'index'])->name('module.index');
Route::get('module-explorer/show/{slug}', [ModuleExplorerController::class, 'show'])->name('module.show');
Route::post('module-explorer/install/', [ModuleExplorerController::class, 'install'])->name('module.install');
Route::post('module-explorer/uninstall/', [ModuleExplorerController::class, 'uninstall'])->name('module.uninstall');

Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('settings/update', [SettingsController::class, 'settings_update'])->name('settings_update');

Route::get('about_us', [SettingsController::class, 'about_us'])->name('about_us');
Route::post('about_us/update', [SettingsController::class, 'about_us_update'])->name('about_us_update');

Route::get('privacy_policy', [SettingsController::class, 'privacy_policy'])->name('privacy_policy');
Route::post('privacy_policy/update', [SettingsController::class, 'privacy_policy_update'])->name('privacy_policy_update');

Route::get('terms_and_conditions', [SettingsController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::post('terms_and_conditions_update/update', [SettingsController::class, 'terms_and_conditions_update'])->name('terms_and_conditions_update');

Route::get('contactus_thanks', [SettingsController::class, 'contactus_thanks'])->name('contactus_thanks');
Route::post('contactus_thanks_update/update', [SettingsController::class, 'contactus_thanks_update'])->name('contactus_thanks_update');

Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::get('contact_us/getdetails', [ContactUsController::class, 'getDetails'])->name('contact_us.getDetails');
Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
Route::post('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
Route::get('contact_us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('contact_users', [ContactUsersController::class, 'index'])->name('contact_users.index');
Route::get('contact_users/getdetails', [ContactUsersController::class, 'getDetails'])->name('contact_users.getDetails');
Route::get('contact_users/edit/{id}', [ContactUsersController::class, 'edit'])->name('contact_users.edit');
Route::post('contact_users/update', [ContactUsersController::class, 'update'])->name('contact_users.update');
Route::get('contact_users/delete/{id}', [ContactUsersController::class, 'destroy'])->name('contact_users.destroy');


Route::get('help_and_support', [HelpSupportController::class, 'index'])->name('help_and_support.index');
Route::get('help_and_support/getdetails', [HelpSupportController::class, 'getDetails'])->name('help_and_support.getDetails');
Route::get('help_and_support/edit/{id}', [HelpSupportController::class, 'edit'])->name('help_and_support.edit');
Route::post('help_and_support/update', [HelpSupportController::class, 'update'])->name('help_and_support.update');
Route::get('help_and_support/delete/{id}', [HelpSupportController::class, 'destroy'])->name('help_and_support.destroy');



Route::get('package', [PackagesController::class, 'index'])->name('package.index');
Route::get('package/create', [PackagesController::class, 'create'])->name('package.create');
Route::post('package/store', [PackagesController::class, 'store'])->name('package.store');
Route::get('package/getdetails', [PackagesController::class, 'getdetails'])->name('package.getdetails');
Route::get('package/edit/{id}', [PackagesController::class, 'edit'])->name('package.edit');
Route::post('package/update', [PackagesController::class, 'update'])->name('package.update');
Route::get('package/delete/{id}', [PackagesController::class, 'destroy'])->name('package.destroy');


Route::get('country', [CountryController::class, 'index'])->name('country.index');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country/store', [CountryController::class, 'store'])->name('country.store');
Route::get('country/getdetails', [CountryController::class, 'getdetails'])->name('country.getdetails');
Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update', [CountryController::class, 'update'])->name('country.update');
Route::get('country/delete/{id}', [CountryController::class, 'destroy'])->name('country.destroy');

Route::get('district', [DistrictController::class, 'index'])->name('district.index');
Route::get('district/create', [DistrictController::class, 'create'])->name('district.create');
Route::post('district/store', [DistrictController::class, 'store'])->name('district.store');
Route::get('district/getdetails', [DistrictController::class, 'getdetails'])->name('district.getdetails');
Route::get('district/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
Route::post('district/update', [DistrictController::class, 'update'])->name('district.update');
Route::get('district/delete/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');

Route::get('city', [CityController::class, 'index'])->name('city.index');
Route::get('city/create', [CityController::class, 'create'])->name('city.create');
Route::post('city/store', [CityController::class, 'store'])->name('city.store');
Route::get('city/getdetails', [CityController::class, 'getdetails'])->name('city.getdetails');
Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
Route::post('city/update', [CityController::class, 'update'])->name('city.update');
Route::get('city/delete/{id}', [CityController::class, 'destroy'])->name('city.destroy');
Route::get('find_district_back/{id}', [CityController::class, 'find_district_back'])->name('find_district_back');



Route::get('agent', [ListController::class, 'agent'])->name('agent.index');
Route::get('agent/create', [ListController::class, 'agent_create'])->name('agent.create');
Route::post('agent/store', [ListController::class, 'agent_store'])->name('agent.store');
Route::get('agent/show/{id}', [ListController::class, 'agent_show'])->name('agent.show');
Route::get('agent_edit/{id}', [ListController::class, 'agent_edit'])->name('agent_edit');
Route::post('agent_update', [ListController::class, 'agent_update'])->name('agent_update');
Route::post('agent_status/update', [ListController::class, 'agent_status_update'])->name('agent_status.update');
Route::get('donor', [ListController::class, 'donor'])->name('donor.index');
Route::get('donor_edit/{id}', [ListController::class, 'donor_edit'])->name('donor_edit');
Route::post('donor_update', [ListController::class, 'donor_update'])->name('donor_update');
Route::get('donor_status/edit/{id}', [ListController::class, 'donor_status_edit'])->name('donor_status.edit');
Route::post('donor_status/update', [ListController::class, 'donor_status_update'])->name('donor_status.update');
Route::get('donate_gigs/{id}', [ListController::class, 'donate_gigs'])->name('donate_gigs');
Route::get('donate_gigs_view/{id}', [ListController::class, 'donate_gigs_view'])->name('donate_gigs_view');
Route::post('donate_gigs/update', [ListController::class, 'donate_gigs_update'])->name('donate_gigs.update');

// Route::get('receivers_list/{id}', [ListController::class, 'receivers_list'])->name('receivers_list');
// Route::get('receiver/create/{id}', [ListController::class, 'receivers_create'])->name('receiver.create');
// Route::post('receiver/store', [ListController::class, 'register'])->name('receiver.store');
// Route::get('receivers_details/{id}', [ListController::class, 'receivers_details'])->name('receivers_details');
// Route::get('receiver/edit/{id}', [ListController::class, 'receivers_edit'])->name('receiver.edit');
// Route::post('receiver/update', [ListController::class, 'receivers_update'])->name('receiver.update');
// Route::get('receiver/delete/{id}', [ListController::class, 'receivers_destroy'])->name('receiver.destroy');


Route::get('receivers_list/{id}', [ListController::class, 'receivers_list'])->name('receivers_list');
Route::get('receiver/create/{id}', [ListController::class, 'receivers_create'])->name('receiver.create');
Route::post('receiver/store', [ListController::class, 'register'])->name('receiver.store');
Route::get('receivers_details/{id}', [ListController::class, 'receivers_details'])->name('receivers_details');
Route::get('receiver/edit/{id}', [ListController::class, 'receivers_edit'])->name('receiver.edit');
Route::post('receiver/update', [ListController::class, 'receivers_update'])->name('receiver.update');
Route::get('receiver/delete/{id}', [ListController::class, 'receivers_destroy'])->name('receiver.destroy');


Route::get('donate_notification', [NotificationController::class, 'index'])->name('donate_notification.index');
Route::get('donate_notification/getdetails', [NotificationController::class, 'getdetails'])->name('donate_notification.getdetails');
Route::get('donate_notification/edit/{id}', [NotificationController::class, 'edit'])->name('donate_notification.edit');
Route::post('donate_notification/update', [NotificationController::class, 'update'])->name('donate_notification.update');


Route::get('agent/getdetails', [ListController::class, 'get_agent_details'])->name('agent.getdetails');
Route::get('donor/getdetails', [ListController::class, 'get_donor_details'])->name('donor.getdetails');
Route::get('donate_gigs_details/{id}', [ListController::class, 'donate_gigs_details'])->name('donate_gigs_details');







