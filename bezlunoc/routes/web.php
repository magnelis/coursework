<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecordUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cache is clear ^^";
});

Route::get('/storage_link', function () {
    Artisan::call('storage:link');

    return "Storage link update ^^";
});

// Гостевые маршруты

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/gallery', 'gallery')->name('page.gallery');
    Route::get('/gallery/filter', 'gallery')->name('page.gallery.filter');
    Route::get('/about', 'about')->name('page.about');
    Route::get('/contacts', 'contacts')->name('page.contacts');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/registration', 'registration')->name('user.reg');
    Route::get('/authorization', 'authorization')->name('user.auth');
    Route::post('/registration', 'store')->name('reg.store');
    Route::post('/authorization', 'loginCheck')->name('login.check');
});

// Для авторизованных пользователей

Route::middleware('role.user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/profile', 'profile')->name('user.profile');
        Route::get('/profile/update', 'profileUpdate')->name('user.profile.update');
        Route::patch('/profile/update/{user}', 'update')->name('user.update');
        Route::get('/profile/update/password', 'profileUpdatePassword')->name('user.profile.update.password');
        Route::patch('/profile/update/password/{user}', 'updatePassword')->name('user.update.password');
    });

    Route::controller(RecordUserController::class)->group(function () {
        Route::get('/record', 'index')->name('user.record');
        Route::get('/getNumberDay', 'getNumberDay')->name('user.getNumberDay');
        Route::post('/record/store', 'storeRecord')->name('user.record.store');
        Route::patch('/destroyRecord/{record}', 'deleteRecord')->name('user.deleteRecord');
    });
});


