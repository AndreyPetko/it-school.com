<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

view()->composer('site.layout', function ($view) {
	$menuDirections = App\Course::groupByDirection(App\Direction::all());
	$view->with('menuDirections', $menuDirections);
});

Route::controller('admin/lessons', 'Admin\LessonController');
Route::controller('admin/course', 'Admin\CourseController');
Route::controller('admin/news', 'Admin\NewsController');
Route::controller('admin/feedback', 'Admin\FeedbackController');
Route::controller('admin/variables', 'Admin\VariableController');
Route::controller('admin', 'Admin\AdminController');




Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');


Route::controller('/', 'Site\HomeController');

