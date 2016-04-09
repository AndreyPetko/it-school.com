<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Request;
use App\Course;



class HomeController extends Controller
{

	public function __construct() {
		$this->request = Request::all();
		unset($this->request);
	}


	public function getIndex() {
		$courses = Course::getTop();
		return view('site.index', compact('courses'));
	}

}
