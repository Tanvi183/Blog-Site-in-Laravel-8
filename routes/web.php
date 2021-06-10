<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Frontend Routes

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home'])->name('website');
Route::get('/category/{slug}', [App\Http\Controllers\FrontEndController::class, 'category'])->name('website.category');
Route::get('/post/{slug}', [App\Http\Controllers\FrontEndController::class, 'post'])->name('website.post');
Route::get('/tag/{slug}', [App\Http\Controllers\FrontEndController::class, 'tag'])->name('website.tag');
Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'about'])->name('website.about');
Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact'])->name('website.contact');

// Admin Panel Routes
Route::group(['prefix' => 'admin', 'namespace'=>'App\Http\Controllers\Backend', 'middleware'=>'auth'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::post('profile', 'UserController@profile_update')->name('user.profile.update');
    Route::resource('user', 'UserController');
    

    Route::get('setting', 'SettingController@edit')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');
});