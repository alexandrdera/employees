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

Route::get('/employees', 'EmployeeController@index');

Route::get('employees/search', ['as' => 'search_var', 'uses' => 'EmployeeController@search']);

Route::get('/employees/{sort_by}', 'EmployeeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
