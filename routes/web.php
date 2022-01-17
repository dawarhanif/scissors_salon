<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);



Auth::routes(['register' => false]);
 Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Back\DashboardController::class, 'index'] )->name('dashboard');
    Route::get('/settings', [App\Http\Controllers\Back\SettingsController::class, 'index'] )->name('all_settings');
    Route::post('/settings', [App\Http\Controllers\Back\SettingsController::class, 'save'] )->name('save_settings');
    Route::resource('banners', App\Http\Controllers\Back\BannersController::class );
    Route::get('/banner-status-change',[App\Http\Controllers\Back\BannersController::class, 'change_status'])->name('change_banner_status');


 });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
