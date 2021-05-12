<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //createCustomers
    Route::get('/createCustomersUsers', 'App\Http\Controllers\UserController@create')->name('createCustomersUsers');
	//createEmployess
    Route::get('/createEmployees', 'App\Http\Controllers\EmployeesController@index')->name('createEmployees');
    Route::get('/createEmployeesUsers', 'App\Http\Controllers\EmployeesController@create')->name('createEmployeesUsers');
	//area
	Route::get('/area', 'App\Http\Controllers\ControllerArea@index')->name('area');
	Route::get('/area_create', 'App\Http\Controllers\ControllerArea@create')->name('area_create');

    //company
    Route::get('/company', 'App\Http\Controllers\CompanyController@index')->name('company');
	Route::post('/company.update', 'App\Http\Controllers\CompanyController@update')->name('company');
	//packages
	Route::get('/packages', 'App\Http\Controllers\PackagesController@index')->name('packages.index');
	Route::post('/packages', 'App\Http\Controllers\PackagesController@store')->name('packages.store');

    //Transactions
    Route::get("/transactions/bills", [TransactionController::class, "index"])->name("bills.index");
    Route::get("/transactions/create", [TransactionController::class, "create"])->name("bills.create");



});

