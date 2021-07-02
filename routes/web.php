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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/about-us', 'HomeController@about');
Route::get('/blog', 'HomeController@blog');
Route::get('/listing', 'HomeController@listing');
Route::get('/contact-us', 'HomeController@contact');
Route::get('/{slug}', 'HomeController@page');


//Admin Routes
Route::get('/admin', 'admin\LoginController@index');
Route::get('/admin/login', 'admin\LoginController@index');
Route::post('/admin/login', 'admin\LoginController@login');
Route::get('/admin/logout', 'admin\LoginController@logout');

Route::get('/admin/dashboard', 'admin\DashboardController@index');

//Pages Routes
Route::get('/admin/pages', 'admin\PagesController@index');
Route::get('/admin/pages/add', 'admin\PagesController@add');
Route::post('/admin/pages/add', 'admin\PagesController@save');
Route::get('/admin/pages/edit/{id}', 'admin\PagesController@edit');
Route::post('/admin/pages/edit', 'admin\PagesController@update');
Route::get('/admin/pages/{id}', 'admin\PagesController@delete');

Route::post('/admin/pages/addvalidate', 'admin\PagesController@addvalidate');
//Pages Routes



