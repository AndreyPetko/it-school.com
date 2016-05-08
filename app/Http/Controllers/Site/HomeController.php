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
use App\UserOrder;
use App\CourseSaler;
use App\Review;
use App\Repositories\ReviewRepository;

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

		foreach ($courses as $course) {
			$course->stars = (new ReviewRepository( Review::all()))->getCourseStars($course->id);
		}

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

		foreach ($courses as $course) {
			$course->stars = (new ReviewRepository( Review::all()))->getCourseStars($course->id);
		}

		return view('site.courses', compact('directions', 'courses'));
	}

	public function getCourse($url) {
		$course = Course::url($url)->first();
		$topCourses = Course::getTop(3, $course->id);
		$reviews = Review::where('course_id', $course->id)->withUser()->get();

		$course->stars =  (new ReviewRepository( Review::all() ))->getCourseStars($course->id);


		foreach ($topCourses as $topCoursesItem) {
			$topCoursesItem->stars = (new ReviewRepository( Review::all()))->getCourseStars($topCoursesItem->id);
		}


		return view('site.coursePage', compact('course', 'topCourses', 'reviews'));
	}


	public function getContacts() {
		$contactsText = Keyval::getByKey('Текст в контактах');
		return view('site.contacts', compact('contactsText'));
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


	public function getAddZayavka($course_id = 0) {
		if($course_id) {
			$courses = Session::get('courses');

			if(!isset($courses)) {
				$courses = [];
			}

			if(array_search($course_id,$courses) === false) {
				$courses[] = $course_id;
				Session::put('courses', $courses);
				Session::save();
			}
		}

		return Redirect::to('/zayavka');
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

		if(empty($coursesId)) {
			return Redirect::back()->with('emptyOrder', 1);
		}

		$courses = Course::whereIn('id', $coursesId)->get();

		if(isset($this->request['user_id'])) {
			$order = new UserOrder;
		} else {
			$order = new Order;
		}

		$saler = new CourseSaler($order, $this->request, $courses);
		$saler->create();

		Session::put('courses', []);
		return Redirect::to('/success');
	}


	public function getBlocked() {
		return view('site.blocked');
	}

	public function getSuccess() {
		$news = News::getLast();

		return view('site.success', compact('news'));
	}

}
