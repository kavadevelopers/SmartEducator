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



Route::get('/test', 'HomeController@test');





Route::get('/', 'HomeController@index');
Route::get('/forget-password', 'HomeController@forgetPassword');
Route::post('/forget-password', 'HomeController@forgetPasswordPost');
Route::get('/home', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::post('/login', 'HomeController@loginTry');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/about-us', 'HomeController@about');
Route::get('/university-approvals', 'HomeController@uapprovals');
Route::get('/blog', 'HomeController@blog');
Route::get('/courses', 'HomeController@listing');
Route::get('/graduation-courses', 'HomeController@listingGraduation');
Route::get('/post-graduation-courses', 'HomeController@listingPostGraduation');
Route::get('/course/{id}', 'HomeController@course');
Route::get('/contact-us', 'HomeController@contact');
Route::get('/blog/{id}', 'HomeController@vblog');
Route::get('/{slug}', 'HomeController@page');

Route::post('/profile', 'HomeController@profile');
Route::post('/uploads', 'HomeController@uploads');

Route::post('/reset-password', 'HomeController@resetPasswordSave');
Route::get('/reset-password/{id}', 'HomeController@resetPassword');



Route::post('/savereview', 'HomeController@savereview');
Route::post('/savecontact', 'HomeController@saveContactForm');


	//Admin Routes
	Route::get('/admin', 'admin\LoginController@index');
	Route::get('/admin/login', 'admin\LoginController@index');
	Route::post('/admin/login', 'admin\LoginController@login');
	Route::get('/admin/logout', 'admin\LoginController@logout');
	Route::get('/admin/dashboard', 'admin\DashboardController@index');

	Route::get('/admin/forget-password', 'admin\LoginController@forget');
	Route::post('/admin/forget-check', 'admin\LoginController@forgetCheck');
	Route::post('/admin/reset-password', 'admin\LoginController@resetPassword');


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

	Route::get('/admin/cources-univercities/slider', 'admin\ListingController@slider');
	Route::get('/admin/cources-univercities/slider/{id}', 'admin\ListingController@deleteSlider');
	Route::get('/admin/cources-univercities/slider/edit/{id}', 'admin\ListingController@editSlider');
	Route::post('/admin/cources-univercities/slider/edit', 'admin\ListingController@updateSlider');
	Route::post('/admin/cources-univercities/slider/save', 'admin\ListingController@saveSlider');

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
	Route::post('/admin/expenses', 'admin\ExpensesController@index');
	Route::get('/admin/expenses/add', 'admin\ExpensesController@add');
	Route::post('/admin/expenses/save', 'admin\ExpensesController@save');
	Route::get('/admin/expenses/download/{f}/{t}', 'admin\ExpensesController@download');
	Route::get('/admin/expenses/{id}', 'admin\ExpensesController@delete');
	//expenses routes

	//deletereq routes	
	Route::get('/admin/deletereq', 'admin\SettingsController@deletereq');
	Route::get('/admin/deletereq/{id}/{st}', 'admin\SettingsController@deletereqStatus');

	//deletereq routes	

	//review routes
	Route::get('/admin/reviews', 'admin\ReviewController@index');
	Route::get('/admin/reviews/status/{status}/{id}', 'admin\ReviewController@status');
	Route::get('/admin/reviews/delete/{id}', 'admin\ReviewController@delete');
	Route::post('/admin/reviews/save', 'admin\ReviewController@save');
	Route::post('/admin/reviews/update', 'admin\ReviewController@update');
	//review routes

	//users routes
	Route::get('/admin/users', 'admin\UsersController@list');
	Route::get('/admin/users/add', 'admin\UsersController@add');
	Route::post('/admin/users/add', 'admin\UsersController@save');
	Route::get('/admin/users/edit/{id}', 'admin\UsersController@edit');
	Route::post('/admin/users/edit', 'admin\UsersController@update');
	Route::get('/admin/users/{id}', 'admin\UsersController@delete');
	//users routes


	//courses routes
	Route::get('/admin/courses', 'admin\CoursesController@index');
	Route::get('/admin/courses/add', 'admin\CoursesController@add');
	Route::post('/admin/courses/add', 'admin\CoursesController@save');
	Route::get('/admin/courses/edit/{id}', 'admin\CoursesController@edit');
	Route::post('/admin/courses/edit', 'admin\CoursesController@update');
	Route::get('/admin/courses/{id}', 'admin\CoursesController@delete');

	//courses routes

	//messages routes
	Route::get('/admin/messages', 'admin\DashboardController@getMessages');
	Route::get('/admin/messages/{id}', 'admin\DashboardController@deleteMessages');
	//messages routes

	//stickey routes
	Route::get('/admin/sticky', 'admin\AboutController@getStickeyContent');
	Route::post('/admin/sticky', 'admin\AboutController@getStickeyContentSave');
	//stickey routes


	//leads routes
	Route::get('/admin/leads', 'admin\LeadsController@list');
	Route::post('/admin/leads', 'admin\LeadsController@list');
	Route::get('/admin/leads/add', 'admin\LeadsController@add');
	Route::post('/admin/leads/add', 'admin\LeadsController@save');
	Route::post('/admin/leads/edit', 'admin\LeadsController@update');
	Route::post('/admin/leads/status', 'admin\LeadsController@status');
	Route::post('/admin/leads/statusbulk', 'admin\LeadsController@statusbulk');
	Route::get('/admin/leads/edit/{id}', 'admin\LeadsController@edit');
	Route::get('/admin/leads/view/{id}', 'admin\LeadsController@view');
	Route::get('/admin/leads/export', 'admin\LeadsController@export');
	Route::post('/admin/leads/import', 'admin\LeadsController@import');
	Route::post('/admin/leads/assign', 'admin\LeadsController@assign');
	Route::get('/admin/leads/{id}', 'admin\LeadsController@delete');
	//leads routes

	//eployee routes
	Route::get('/admin/employee', 'admin\EmployeeController@list');
	Route::get('/admin/employee/add', 'admin\EmployeeController@add');
	Route::post('/admin/employee/add', 'admin\EmployeeController@save');
	Route::get('/admin/employee/edit/{id}', 'admin\EmployeeController@edit');
	Route::post('/admin/employee/edit', 'admin\EmployeeController@update');
	Route::get('/admin/employee/view/{id}', 'admin\EmployeeController@view');
	Route::get('/admin/employee/export', 'admin\EmployeeController@export');
	Route::post('/admin/employee/import', 'admin\EmployeeController@import');
	Route::get('/admin/employee/uploads', 'admin\EmployeeController@uploads');
	Route::get('/admin/employee/uploads/skip', 'admin\EmployeeController@uploadsSkip');
	Route::post('/admin/employee/uploads', 'admin\EmployeeController@uploadsSave');
	Route::get('/admin/employee/{id}', 'admin\EmployeeController@delete');

	//eployee routes


	//students routes
	Route::get('/admin/students', 'admin\StudentsController@list');
	Route::get('/admin/students/add', 'admin\StudentsController@add');
	Route::post('/admin/students/add', 'admin\StudentsController@save');
	Route::get('/admin/students/edit/{id}', 'admin\StudentsController@edit');
	Route::post('/admin/students/edit', 'admin\StudentsController@update');
	Route::get('/admin/students/view/{id}', 'admin\StudentsController@view');
	Route::get('/admin/students/export', 'admin\StudentsController@export');
	Route::post('/admin/students/import', 'admin\StudentsController@import');
	Route::get('/admin/students/uploads', 'admin\StudentsController@uploads');
	Route::get('/admin/students/uploads/skip', 'admin\StudentsController@uploadsSkip');
	Route::post('/admin/students/uploads', 'admin\StudentsController@uploadsSave');


	Route::get('/admin/students/{id}', 'admin\StudentsController@delete');
	//students routes


//reference routes
	Route::get('/admin/reference', 'admin\LeadsController@reference');
	Route::post('/admin/reference/save', 'admin\LeadsController@save_reference');
	Route::get('/admin/reference/edit/{id}', 'admin\LeadsController@edit_reference');
	Route::post('/admin/reference/edit', 'admin\LeadsController@update_reference');
	Route::get('/admin/reference/{id}', 'admin\LeadsController@referenceDel');
//reference routes

	//attype routes
	Route::get('/admin/attype', 'admin\AttendanceController@attype');
	Route::post('/admin/attype/save', 'admin\AttendanceController@save_attype');
	Route::get('/admin/attype/edit/{id}', 'admin\AttendanceController@edit_attype');
	Route::post('/admin/attype/edit', 'admin\AttendanceController@update_attype');
	Route::get('/admin/attype/{id}', 'admin\AttendanceController@attypeDel');
//attype routes

	//attype routes
	Route::get('/admin/attendance', 'admin\AttendanceController@attendance');
	Route::post('/admin/attendance', 'admin\AttendanceController@attendance');
	Route::post('/admin/attendance/download', 'admin\AttendanceController@attendanceDownload');
	Route::post('/admin/attendance/save', 'admin\AttendanceController@attendance_save');
	Route::get('/admin/attendance/{id}', 'admin\AttendanceController@atDelete');
	//attype routes
