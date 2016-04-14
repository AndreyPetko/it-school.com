<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Request;
use App\Course;
use Auth;
use App\News;
use App\Bid;
use Redirect;
use App\Keyval;

class HomeController extends Controller
{

	public function __construct() {
		$this->request = Request::all();
		unset($this->request['_token']);
	}


	public function getIndex() {
		$courses = Course::getTop(5);
		$news = News::getLast();
		$mainText = Keyval::getByKey('Текст на главной');

		return view('site.index', compact('courses', 'news', 'mainText'));
	}


	public function postBidAdd() {
		Bid::create($this->request);
		return Redirect::back()->with('bidSucces', 1);
	}


	public function getNewsList() {
		$news = News::items();
		$courses = Course::getTop(2);
		return view('site.news', compact('news', 'courses'));
	}

}
