<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ModuleExplorerController;
use App\Http\Controllers\Backend\PackagesController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ListController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


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

Route::get('city', [CityController::class, 'index'])->name('city.index');
Route::get('city/create', [CityController::class, 'create'])->name('city.create');
Route::post('city/store', [CityController::class, 'store'])->name('city.store');
Route::get('city/getdetails', [CityController::class, 'getdetails'])->name('city.getdetails');
Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
Route::post('city/update', [CityController::class, 'update'])->name('city.update');
Route::get('city/delete/{id}', [CityController::class, 'destroy'])->name('city.destroy');


Route::get('agent', [ListController::class, 'agent'])->name('agent.index');
Route::get('donor', [ListController::class, 'donor'])->name('donor.index');
Route::get('agent/getdetails', [ListController::class, 'get_agent_details'])->name('agent.getdetails');
Route::get('donor/getdetails', [ListController::class, 'get_donor_details'])->name('donor.getdetails');





