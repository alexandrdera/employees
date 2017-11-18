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

Route::get('/employees/{sort_by}', 'EmployeeController@index');

Route::get('employees_search', ['as' => 'search_var', 'uses' => 'EmployeeController@search']);