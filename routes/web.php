<?php

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
    return view('index');
});

Route::get('/employees_tree', 'EmployeesTreeController@index');

Route::resource('/employees', 'EmployeeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Роуты для DataTables
Route::get('/employees', 'DatatablesController@getIndex')->name('datatables'); 
Route::get('datatables.data', 'DatatablesController@anyData')->name('datatables.data');

Route::put('change.chief', 'EmployeesTreeController@changeChief')->name('change.chief');
Route::post('get.subemployees', 'EmployeesTreeController@getSubEmployees')->name('get.subemployees');
