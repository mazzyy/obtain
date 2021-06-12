<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserImportController;
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
    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');
    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');
    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //createCustomers
    Route::post('/createCustomersUsers', 'App\Http\Controllers\UserController@create')->name('createCustomersUsers');
    Route::get('/createCustomersUsers/show', 'App\Http\Controllers\UserController@show')->name('show');
    Route::post('/createCustomersUsers/update', 'App\Http\Controllers\UserController@update')->name('customer.update');
    Route::get('/createCustomersUsers/changestatus', 'App\Http\Controllers\UserController@changestatus')->name('customer.changestatus');

    //Excel import
    Route::post("/import", [UserController::class, "import"])->name("import");
    Route::post("/import", [UserImportController::class, "store"])->name("store");

    //createEmployess
    Route::get('/createEmployees', 'App\Http\Controllers\EmployeesController@index')->name('createEmployees');
    Route::post('/createEmployeesUsers', 'App\Http\Controllers\EmployeesController@create')->name('createEmployeesUsers');

    //DealerDetails
    Route::get('/dealer', 'App\Http\Controllers\dealerDetailsController@index')->name('dealer');
    Route::get('/dealer/create', 'App\Http\Controllers\dealerDetailsController@create')->name('dealer.create');

    //Query
    Route::get('/queries', 'App\Http\Controllers\QuerieController@index')->name('queries');
    Route::post('/queries/create', 'App\Http\Controllers\QuerieController@create')->name('queries.create');

    //area
    Route::get('/area', 'App\Http\Controllers\ControllerArea@index')->name('area');
    Route::get('/area_create', 'App\Http\Controllers\ControllerArea@create')->name('area_create');

    //company
    Route::get('company', 'App\Http\Controllers\CompanyController@index')->name('company');
    Route::post('/company.update', 'App\Http\Controllers\CompanyController@update')->name('company');
    //packages
    Route::get('/packages', 'App\Http\Controllers\PackagesController@index')->name('packages.index');
    Route::post('/packages', 'App\Http\Controllers\PackagesController@store')->name('packages.store');
    Route::post('/packages/update', 'App\Http\Controllers\PackagesController@update')->name('packages.update');

    //Transactions
    Route::any("/transactions/bills", [TransactionController::class, "index"])->name("bills.index");
    Route::post("/transactions/create", 'App\Http\Controllers\TransactionController@create')->name("bills.create");
    //download bill in excel route
    Route::get("/transactions/excel", 'App\Http\Controllers\excelController@excelbill')->name("bills.excel");
    // customerCollectionn
    Route::get("/transactions/collectionn", 'App\Http\Controllers\customercollectionController@index')->name("collection");
    Route::get("/transactions/find", 'App\Http\Controllers\customercollectionController@find')->name("collection.find");
    Route::get("/transactions/customerbill", 'App\Http\Controllers\customercollectionController@customerbill')->name("collection.customerbill");
    Route::post("/transactions/collectionn/reveive", 'App\Http\Controllers\customercollectionController@reveive')->name("collection.reveive");
    Route::post("/transactions/collectionn/newAmount", 'App\Http\Controllers\customercollectionController@newAmount')->name("collection.newAmount");

   //report
    //    customer collection
   Route::get("/CustomerbillReport", 'App\Http\Controllers\CustomerbillReportController@index')->name("CustomerbillReport");
   Route::get("/CustomerbillReport/filter", 'App\Http\Controllers\CustomerbillReportController@filter')->name("CustomerbillReport.filter");
    //defaulter
   Route::get("/Defaulter", 'App\Http\Controllers\DefaulterReportController@index')->name("Defaulter");
   Route::get("/Defaulter/filter", 'App\Http\Controllers\DefaulterReportController@filter')->name("Defaulter.filter");
    //UserList
   Route::get("/UserList", 'App\Http\Controllers\UserListController@index')->name("UserList");
   Route::get("/UserList/filter", 'App\Http\Controllers\UserListController@filter')->name("UserList.filter");


});
