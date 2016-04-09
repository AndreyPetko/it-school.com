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


Route::controller('admin/lessons', 'Admin\LessonController');
Route::controller('admin/course', 'Admin\CourseController');
Route::controller('admin/news', 'Admin\NewsController');
Route::controller('admin', 'Admin\AdminController');


Route::controller('/', 'Site\HomeController');
