<?php

use App\Http\Middleware\RoutesAdmin;
use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\admin\AdminController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'loginCheck')->name('login.check');
});

Route::middleware('role.admin')->group(function () {

    Route::controller(\App\Http\Controllers\admin\AdminController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(\App\Http\Controllers\admin\RecordsController::class)->group(function () {
        Route::get('/records', 'index')->name('records');
        Route::patch('/cancelRecord/{record}', 'cancelRecord')->name('records.cancelRecord');
    });
    Route::controller(\App\Http\Controllers\admin\UsersController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/users/search', 'searchUser')->name('users.searchUser');
        Route::get('/users/show/{user}', 'show')->name('users.show');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    });
    Route::controller(\App\Http\Controllers\admin\TimelineController::class)->group(function () {
        Route::get('/timeline', 'index')->name('timeline');
        Route::get('/timeline/check', 'checkDate')->name('timeline.check');
        Route::get('/timeline/create', 'create')->name('timeline.create');
        Route::post('/timeline/store', 'store')->name('timeline.store');
        Route::delete('/timeline/{date_id}/{time_id}', 'destroy')->name('timeline.destroy');
    });
    Route::controller(\App\Http\Controllers\admin\TimeController::class)->group(function () {
        Route::get('/time', 'index')->name('time');
        Route::get('/time/create', 'create')->name('time.create');
        Route::post('/time/store', 'store')->name('time.store');
        Route::delete('/time/{time}', 'destroy')->name('time.destroy');
    });
    Route::controller(\App\Http\Controllers\admin\SizesController::class)->group(function () {
        Route::get('/size', 'index')->name('size');
        Route::get('/size/create', 'create')->name('size.create');
        Route::post('/size/store', 'store')->name('size.store');
        Route::delete('/size/{size}', 'destroy')->name('size.destroy');
        Route::get('/size/edit/{size}', 'edit')->name('size.edit');
        Route::patch('/size/update/{size}', 'update')->name('size.update');
    });
    Route::controller(\App\Http\Controllers\admin\StylesController::class)->group(function () {
        Route::get('/style', 'index')->name('style');
        Route::get('/style/create', 'create')->name('style.create');
        Route::post('/style/store', 'store')->name('style.store');
        Route::delete('/style/{style}', 'destroy')->name('style.destroy');
        Route::get('/style/edit/{style}', 'edit')->name('style.edit');
        Route::patch('/style/update/{style}', 'update')->name('style.update');
    });
    Route::controller(\App\Http\Controllers\admin\PageController::class)->group(function () {
        Route::get('/pages', 'index')->name('pages');
    });
    Route::controller(\App\Http\Controllers\admin\MainController::class)->group(function () {
        Route::get('/mainPage', 'index')->name('mainPage');
        Route::get('/mainPage/create', 'create')->name('mainPage.create');
        Route::post('/mainPage/store', 'store')->name('mainPage.store');
        Route::get('/mainPage/edit/{content}', 'edit')->name('mainPage.edit');
        Route::patch('/mainPage/update/{content}', 'update')->name('mainPage.update');
        Route::delete('/mainPage/destroy/{content}', 'destroy')->name('mainPage.destroy');
    });
    Route::controller(\App\Http\Controllers\admin\AboutController::class)->group(function () {
        Route::get('/aboutPage', 'index')->name('aboutPage');
        Route::get('/aboutPage/edit/{content}', 'edit')->name('aboutPage.edit');
        Route::patch('/aboutPage/update/{content}', 'update')->name('aboutPage.update');
        Route::get('/aboutPage/media/edit/{media}', 'editMedia')->name('aboutPage.media.edit');
        Route::patch('/aboutPage/media/update/{media}', 'updateMedia')->name('aboutPage.media.update');
    });
    Route::controller(\App\Http\Controllers\admin\ContactController::class)->group(function () {
        Route::get('/contactsPage', 'index')->name('contactsPage');
        Route::get('/contactsPage/edit/{content}', 'edit')->name('contactsPage.edit');
        Route::patch('/contactsPage/update/{content}', 'update')->name('contactsPage.update');
    });
    Route::controller(\App\Http\Controllers\admin\GalleryController::class)->group(function () {
        Route::get('/gallery', 'index')->name('gallery');
        Route::get('/gallery/filter', 'filter_by_gallery')->name('gallery.filter');
        Route::get('/gallery/create', 'create')->name('gallery.create');
        Route::post('/gallery/store', 'store')->name('gallery.store');
        Route::delete('/gallery/{tattoo}', 'destroy')->name('gallery.destroy');
        Route::get('/gallery/edit/{tattoo}', 'edit')->name('gallery.edit');
        Route::patch('/gallery/update/{tattoo}', 'update')->name('gallery.update');
    });
});



