<?php

use App\Mail\Credentials;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Province\DashboardController as ProvinceDashboardController;
use App\Http\Controllers\Province\DistrictController as  ProvinceDistrictController;
use App\Http\Controllers\Province\DistrictUserController;
use App\Http\Controllers\District\DistrictGroupeController;
use App\Http\Controllers\District\GroupeUserController;
use App\Http\Controllers\District\DashboardController as DistrictDashboardController;
use App\Http\Controllers\Groupe\DashboardController as GroupeDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\Groupe\UniteController;

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
    Route::get('/province_dashboard', [ProvinceDashboardController::class, 'index'])->name('province.home');
    Route::resource('districts', ProvinceDistrictController::class);
    Route::resource('district_users', DistrictUserController::class);
});

Route::group(['middleware' => ['auth', 'role:district']], function () {
    Route::get('/district_dashboard', [DistrictDashboardController::class, 'index'])->name('district.home');
    //Route::resource('groupes', DistrictGroupeController::class);
    Route::resource('groupe_users', GroupeUserController::class);
});

Route::group(['middleware' => ['auth', 'role:groupe']], function () {
    Route::get('/groupe_dashboard', [GroupeDashboardController::class, 'index'])->name('groupe.home');
    Route::get('/meute', [UniteController::class, 'meute'])->name('groupe.meute');
    Route::get('/troupe', [UniteController::class, 'troupe'])->name('groupe.troupe');
    Route::get('/compagnie', [UniteController::class, 'compagnie'])->name('groupe.compagnie');
    Route::get('/clan', [UniteController::class, 'clan'])->name('groupe.clan');
    Route::get('/route', [UniteController::class, 'route'])->name('groupe.route');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/users', UserController::class);
    Route::post('/users/{user}/is_active', [UserController::class, 'is_active'])->name('users.is_active');
    Route::resource('/personnes', PersonneController::class);
    Route::post('/personnes/{personne}/is_active', [PersonneController::class, 'is_active'])->name('personnes.is_active');
    Route::resource('groupes', DistrictGroupeController::class);
});



Route::get('add-to-log', [App\Http\Controllers\HomeController::class, 'myTestAddToLog']);
Route::get('logActivity',[App\Http\Controllers\HomeController::class, 'logActivity']);
