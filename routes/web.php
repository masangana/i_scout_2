<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Province\DashboardController as ProvinceDashboardController;
use App\Http\Controllers\District\DashboardController as DistrictDashboardController;
use App\Http\Controllers\Groupe\DashboardController as GroupeDashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:province']], function () {
    Route::get('/province_dashboard', [ProvinceDashboardController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'role:district']], function () {
    Route::get('/district_dashboard', [DistrictDashboardController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'role:groupe']], function () {
    Route::get('/groupe_dashboard', [GroupeDashboardController::class, 'index']);
});