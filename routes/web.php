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
	Route::post('/admin/forget', 'admin\LoginController@index');
	Route::get('/admin/login', 'admin\LoginController@index');
	Route::post('/admin/login', 'admin\LoginController@login');
	Route::get('/admin/logout', 'admin\LoginController@logout');

	Route::get('/admin/dashboard', 'admin\DashboardController@index');


	//Home Routes
		
	Route::get('/admin/home/slider', 'admin\HomeController@slider');
	Route::get('/admin/home/slider/{id}', 'admin\HomeController@delete');
	Route::get('/admin/home/slider/edit/{id}', 'admin\HomeController@edit');
	Route::post('/admin/home/slider/edit', 'admin\HomeController@update');
	Route::post('/admin/home/slider/save', 'admin\HomeController@save');
	Route::get('/admin/home/steps', 'admin\HomeController@steps');
	Route::post('/admin/home/steps', 'admin\HomeController@stepsSave');

	//Home Routes

	//About Routes
	Route::get('/admin/about/slider', 'admin\AboutController@slider');
	Route::get('/admin/about/slider/edit/{id}', 'admin\AboutController@edit_slider');
	Route::post('/admin/about/slider/save', 'admin\AboutController@slider_save');
	Route::post('/admin/about/slider/edit', 'admin\AboutController@slider_update');
	Route::get('/admin/about/slider/{id}', 'admin\AboutController@slider_delete');

	Route::get('/admin/about/content', 'admin\AboutController@content');
	Route::post('/admin/about/content', 'admin\AboutController@save');


	Route::get('/admin/about/team', 'admin\AboutController@team');
	Route::get('/admin/about/team/{id}', 'admin\AboutController@delete_team');
	Route::get('/admin/about/team/edit/{id}', 'admin\AboutController@edit_team');
	Route::post('/admin/about/team/save', 'admin\AboutController@save_team');
	Route::post('/admin/about/team/edit', 'admin\AboutController@update_team');
	//About Routes

	//Listing Routes
	Route::get('/admin/cources-univercities/content', 'admin\ListingController@content');
	Route::post('/admin/cources-univercities/content', 'admin\ListingController@save');
	//Listing Routes

	//Blog Routes
	Route::get('/admin/blog/content', 'admin\BlogController@content');
	Route::post('/admin/blog/content', 'admin\BlogController@save');
	Route::get('/admin/blog/list', 'admin\BlogController@list');
	Route::get('/admin/blog/add', 'admin\BlogController@add');
	Route::post('/admin/blog/add', 'admin\BlogController@saveBlog');
	Route::get('/admin/blog/edit/{id}', 'admin\BlogController@edit');
	Route::post('/admin/blog/edit', 'admin\BlogController@updateBlog');
	Route::get('/admin/blog/list/{id}', 'admin\BlogController@deleteBlog');
	//Blog Routes

	//Contact Routes
	Route::get('/admin/contact/content', 'admin\ContactController@content');
	Route::post('/admin/contact/content', 'admin\ContactController@save');
	//Contact Routes


	//Pages Routes
	Route::get('/admin/pages', 'admin\PagesController@index');
	Route::get('/admin/pages/add', 'admin\PagesController@add');
	Route::post('/admin/pages/add', 'admin\PagesController@save');
	Route::get('/admin/pages/edit/{id}', 'admin\PagesController@edit');
	Route::post('/admin/pages/edit', 'admin\PagesController@update');
	Route::get('/admin/pages/{id}', 'admin\PagesController@delete');

	Route::post('/admin/pages/addvalidate', 'admin\PagesController@addvalidate');
	//Pages Routes

	//common Routes
	Route::get('/admin/common/social-links', 'admin\SettingsController@socialLinks');
	Route::get('/admin/common/social-links/{id}', 'admin\SettingsController@socialLinksDelete');
	Route::get('/admin/common/social-links/edit/{id}', 'admin\SettingsController@socialLinksEdit');
	Route::post('/admin/common/social-links', 'admin\SettingsController@socialLinksSave');
	Route::post('/admin/common/social-links/edit', 'admin\SettingsController@socialLinksUpdate');
	//common Routes

	//footer routes
	Route::get('/admin/footer-links', 'admin\SettingsController@footerLinks');
	Route::get('/admin/footer-links/edit/{id}', 'admin\SettingsController@footerLinksEdit');
	Route::post('/admin/footer-links/edit', 'admin\SettingsController@footerLinksUpdate');
	//footer routes

	Route::get('/admin/settings', 'admin\SettingsController@index');
	Route::post('/admin/settings', 'admin\SettingsController@save');
	Route::get('/admin/profile', 'admin\SettingsController@profile');
	Route::post('/admin/profile/save', 'admin\SettingsController@profileSave');



	//expenses routes
	Route::get('/admin/expenses', 'admin\ExpensesController@index');
	Route::get('/admin/expenses/add', 'admin\ExpensesController@add');
	Route::post('/admin/expenses/save', 'admin\ExpensesController@save');
	Route::get('/admin/expenses/{id}', 'admin\ExpensesController@delete');
	//expenses routes

	//users routes
	Route::get('/admin/users', 'admin\UsersController@list');
	Route::get('/admin/users/add', 'admin\UsersController@add');
	Route::post('/admin/users/add', 'admin\UsersController@save');
	Route::get('/admin/users/edit/{id}', 'admin\UsersController@edit');
	Route::post('/admin/users/edit', 'admin\UsersController@update');
	Route::get('/admin/users/{id}', 'admin\UsersController@delete');
	//users routes




