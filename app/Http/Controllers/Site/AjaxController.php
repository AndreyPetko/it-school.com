<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;


use Session;
use App\Course;

class AjaxController extends Controller
{
	public function getCurCourseDelete($id) {
		$courses = Session::get('courses');

		unset($courses[array_search($id,$courses)]);

		Session::put('courses', $courses);
		Session::save();

		return Course::totalPrice($courses);
	}


	public function getCurCourseAdd($id) {
		$courses = Session::get('courses');

		if($courses && array_search($id,$courses) !== false) {
			return 0;
		}

		$courses[] = $id;

		$course = Course::find($id);

		Session::put('courses', $courses);
		Session::save();

		return view('site.components.bid-item', compact('course'));

	}

	public function getCurrentTotal() {
		$courses = Session::get('courses');
		return Course::totalPrice($courses);
	}

	public function getCourseLessons($courseId) {
		return Course::find($courseId)->getLessons();
	}
}