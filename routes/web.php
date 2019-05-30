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

Route::get('/unauth', 'PagesController@index');

Route::resource('projects', 'ProjectsController');
Route::get('/projects/{id}', 'ProjectsController@show');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('contracts', 'ContractsController');
Route::get('/contracts/{id}', 'ContractsController@show');

Route::resource('guarantees', 'GuaranteesController');
Route::get('/guarantees/{id}', 'GuaranteesController@show');

Route::resource('projects/list', 'ProjectContractsController');
Route::get('projects/list/{id}', 'ProjectContractsController@show');
