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
    Route::post('/upload-report', ['as' => 'upload.report', 'uses' => 'App\Http\Controllers\AdminPanel\ReportsController@createReport']);
    Route::get('/report', ['as' => 'admin.report', 'uses' => 'App\Http\Controllers\AdminPanel\ReportsController@uploadReportForm']) ;
});

Route::get('/index', ['as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/', ['as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/service', ['as' => 'service', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/package', ['as' => 'packages', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'App\Http\Controllers\AboutController@index']);
Route::get('/jobs', ['as' => 'jobs', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/privacy', ['as' => 'privacy', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/blog', ['as' => 'blog', 'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/reports', ['as' => 'web.reports', 'uses' => 'App\Http\Controllers\ReportsController@getReportsAjax']);

//Route::get('/404', ['as' => '404', 'uses' => 'MenuController@notFound']);
