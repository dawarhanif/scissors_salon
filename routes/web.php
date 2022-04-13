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
    Route::resource('about-us', App\Http\Controllers\Back\AboutUsController::class );

    Route::get('/banner-status-change',[App\Http\Controllers\Back\BannersController::class, 'change_status'])->name('change_banner_status');
    Route::resource('service-categories', App\Http\Controllers\Back\ServiceCategoriesController::class);
    Route::get('/service-slug-check',[App\Http\Controllers\Back\ServiceCategoriesController::class, 'slugCheck'])->name('check_slug_category');

    Route::get('/category-status-change',[App\Http\Controllers\Back\ServiceCategoriesController::class, 'change_status'])->name('change_category_status');
    Route::resource('services', App\Http\Controllers\Back\ServicesController::class);
    Route::get('/services-slug-check',[App\Http\Controllers\Back\ServicesController::class, 'slugCheck'])->name('check_slug_service');
    Route::get('/service-status-change',[App\Http\Controllers\Back\ServicesController::class, 'change_status'])->name('change_service_status');
   
    Route::get('/image-gallery', [App\Http\Controllers\Back\ImageGalleryController::class,'index'])->name('image_gallery_index');
    Route::post('/image-gallery', [App\Http\Controllers\Back\ImageGalleryController::class,'upload'])->name('image_gallery_post');
    Route::post('/image-gallery-delete', [App\Http\Controllers\Back\ImageGalleryController::class,'destroy'])->name('image_gallery_delete');
   
    Route::resource('/experts', App\Http\Controllers\Back\ExpertsController::class);
    Route::get('/expert-status-change',[App\Http\Controllers\Back\ExpertsController::class, 'change_status'])->name('change_expert_status');
    Route::post('/expert-delete', [App\Http\Controllers\Back\ExpertsController::class,'destroy'])->name('expert_delete');

    Route::get('/promo', [App\Http\Controllers\Back\PromoController::class, 'index'] )->name('promo');
    Route::post('/promo', [App\Http\Controllers\Back\PromoController::class, 'save'] )->name('update_promo');
    Route::post('/promo-save', [App\Http\Controllers\Back\PromoController::class, 'save'] )->name('save_promo');

    Route::resource('/blogs', App\Http\Controllers\Back\BlogController::class);
    Route::get('/blog-status-change',[App\Http\Controllers\Back\BlogController::class, 'change_status'])->name('change_blog_status');
    Route::post('/blog-delete', [App\Http\Controllers\Back\BlogController::class,'destroy'])->name('blog_delete');

 });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\front\HomeController::class, 'index']);