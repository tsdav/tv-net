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
Route::prefix('admin')->group(function () {
    Route::get('/', ['as' => 'login', 'uses' => 'App\Http\Controllers\AdminPanel\AdminController@login']);
    Route::post('/authorize', ['as' => 'admin.auth', 'uses' => 'App\Http\Controllers\AdminPanel\AdminController@authenticate']);

    Route::middleware('adminLogged')->group(function () {
        Route::prefix('report')->group(function () {
            Route::get('/', ['as' => 'admin.report', 'uses' => 'App\Http\Controllers\AdminPanel\ReportsController@uploadReportForm']);
            Route::post('/upload', ['as' => 'upload.report', 'uses' => 'App\Http\Controllers\AdminPanel\ReportsController@createReport']);
        });

        Route::prefix('package')->group(function () {
            Route::get('/', ['as' => 'admin.packages', 'uses' => 'App\Http\Controllers\AdminPanel\PackageController@index']);
            Route::get('/form', ['as' => 'admin.packages.form', 'uses' => 'App\Http\Controllers\AdminPanel\PackageController@form']);
            Route::post('/create', ['as' => 'admin.packages.create', 'uses' => 'App\Http\Controllers\AdminPanel\PackageController@createPackage']);
            Route::post('/edit/{id}', ['as' => 'admin.packages.edit', 'uses' => 'App\Http\Controllers\AdminPanel\PackageController@editPackage']);
            Route::get('/show/{id}', ['as' => 'admin.packages.show', 'uses' => 'App\Http\Controllers\AdminPanel\PackageController@getPackage']);
        });

        Route::prefix('service')->group(function() {
            Route::get('/', ['as' => 'admin.services', 'uses' => 'App\Http\Controllers\AdminPanel\ServiceController@index']);
            Route::get('/form', ['as' => 'admin.services.form', 'uses' => 'App\Http\Controllers\AdminPanel\ServiceController@form']);
            Route::post('/create', ['as' => 'admin.services.create', 'uses' => 'App\Http\Controllers\AdminPanel\ServiceController@createService']);
            Route::post('/edit/{id}', ['as' => 'admin.services.edit', 'uses' => 'App\Http\Controllers\AdminPanel\ServiceController@editService']);
            Route::get('/show/{id}', ['as' => 'admin.services.show', 'uses' => 'App\Http\Controllers\AdminPanel\ServiceController@getService']);
        });
    });
});

Route::get('/index', ['as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/', ['as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/service', ['as' => 'service', 'uses' => 'App\Http\Controllers\ServiceController@index']);
Route::get('/package', ['as' => 'packages', 'uses' => 'App\Http\Controllers\PackageController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'App\Http\Controllers\AboutController@index']);
Route::get('/jobs', ['as' => 'jobs', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/privacy', ['as' => 'privacy', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/blog', ['as' => 'blog', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/reports', ['as' => 'web.reports', 'uses' => 'App\Http\Controllers\ReportsController@getReportsAjax']);

//Route::get('/404', ['as' => '404', 'uses' => 'MenuController@notFound']);
