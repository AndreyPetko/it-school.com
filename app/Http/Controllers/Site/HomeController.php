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
use App\Direction;
use App\Comment;
use App\Feedback;
use App\Sendmail;
use App\Pages;
use Session;
use App\Order;

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
		$giftText = Keyval::getByKey('Подарок');
		$giftText2 = Keyval::getByKey('Подарок2');

		return view('site.index', compact('courses', 'news', 'mainText', 'giftText', 'giftText2'));
	}


	public function postBidAdd() {
		Bid::create($this->request);
		return Redirect::back()->with('bidSuccess', 1);
	}

	public function postAddFeedback() {
		Feedback::create($this->request);
		return Redirect::back()->with('feedbackSuccess', 1);
	}

	public function postSendmailAdd() {
		Sendmail::create($this->request);
		return Redirect::back()->with('sendmailSuccess', 1);
	}

	public function getNovelty($url) {
		$novelty = News::where('url', $url)->first();
		$comments = Comment::where('item_id', $novelty->id)->get();
		return view('site.novelty', compact('novelty', 'comments'));
	}

	public function postCommentAdd() {
		Comment::create($this->request);
		return Redirect::back();
	}


	public function getNewsList() {
		$news = News::items();
		$courses = Course::getTop(2);
		return view('site.news', compact('news', 'courses'));
	}

	public function getCourses() {
		$directions = Direction::all();
		$courses = Course::all();
		return view('site.courses', compact('directions', 'courses'));
	}

	public function getCourse($url) {
		$topCourses = Course::getTop(3);
		$course = Course::url($url)->first();
		return view('site.coursePage', compact('course', 'topCourses'));
	}


	public function getContacts() {
		return view('site.contacts');
	}

	public function getP($url) {
		$page = Pages::where('url', $url)->first();
		return view('site.staticPage', compact('page'));
	}

	public function getAbout() {
		$page = Pages::where('url', 'about')->first();
		return view('site.staticPage', compact('page'));
	}

	public function getPartners() {
		$page = Pages::where('url', 'partners')->first();
		return view('site.staticPage', compact('page'));
	}

	public function getZayavka() {
		$directions = Course::groupByDirection(Direction::all());
		$coursesIds = Session::get('courses');

		$currentCourses = Course::whereIn('id', $coursesIds)->get();
		$totalprice = Course::totalPrice($coursesIds);

		return view('site.zayavka', compact('directions', 'currentCourses', 'totalprice'));
	}

	public function postZayavka() {
		$coursesId = Session::get('courses');
		$courses = Course::whereIn('id', $coursesId)->get();
		Order::createItem($this->request, $courses);
		Session::put('courses', []);
		return Redirect::back();
	}

}
