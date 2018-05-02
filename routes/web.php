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

Route::get('/', 'EmployeeController@index')->name('index');

Route::get('/employee/{emp_no}', 'EmployeeController@show')
    ->name('show');

Route::get('/department/{dept_no}', 'EmployeeController@show_by_department')
    ->name('show_by_department');

Route::get('/search', 'EmployeeController@search')
    ->name('search');


Route::get('/dept_salary', 'EmployeeController@department_salary')->name('salary');

Route::get('/highest_sal', 'EmployeeController@highest_salary')->name('highest_salary');

Route::get('/show_fluidity', 'EmployeeController@show_fluidity')->name('show_fluidity');

Route::get('/fluidity/{dept_no}', 'EmployeeController@fluidity')->name('fluidity');
