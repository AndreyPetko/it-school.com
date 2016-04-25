<?php

namespace App\Http\Controllers\User;

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
use App\Lesson;
use App\Message;
use App\Helper;
use App\UserLesson;
use App\Discussion;

class HomeController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
		$this->request = Request::all();
		unset($this->request['_token']);
	}


	public function getIndex() {
		$user_id = Auth::user()->id;
		$userCourses = Course::getUserItems($user_id);

		$userCoursesId = [];

		foreach ($userCourses as $userCourse) {
			$userCourse->progress = Course::getProgress($userCourse, $user_id);
			$userCourseId[] = $userCourse->id;
		}

		$courses = Course::getOther($userCourseId);

		return view('profile.dashboard', compact('courses', 'userCourses'));
	}


	public function getCourse($url) {
		$course = Course::url($url)->first();
		$course->getCourseProgress();

		$lessons = $course->lessons;


		foreach ($lessons as $lesson) {
			$lesson->getMark(Auth::user()->id);
			if($lesson->position > $course->currentLesson()) {
				$lesson->unavail = 1;
			}
		}

		return view('profile.course', compact('course', 'lessons'));
	}

	public function getLesson($id) {
		$lesson = Lesson::find($id);

		$userLesson = UserLesson::getInstance(Auth::user()->id, $id);

		if($userLesson) {
			$mark = $userLesson->getMark();
		} else {
			$mark = 0;
		}

		return view('profile.lesson', compact('lesson', 'mark'));
	}

	public function getLessonHomework($id) {
		$userId = Auth::user()->id;
		$messages = Message::current($userId, $id)->paginate(5);
		$lesson = Lesson::find($id);

		$userLesson = UserLesson::getInstance($userId, $id);

		if($userLesson) {
			$mark = $userLesson->getMark();
			$files = $userLesson->files();
		} else {
			$mark = 0;
			$files = [];
		}


		return view('profile.lesson-homework', compact('lesson', 'messages', 'files', 'mark'));
	}

	public function postAddLessonMessage() {
		$message = new Message;
		$message->message = $this->request['message'];
		$message->user_id = Auth::user()->id;
		$message->admin = 0;
		$message->lesson_id = $this->request['lesson_id'];
		$message->save();

		return Redirect::back();
	}

	public function postAddHomework() {
		$filename = '';

		if(Request::hasFile('file') && Request::file('file')->isValid()) {
			$extension =  Request::file('file')->getClientOriginalExtension();
			$filename = uniqid() . '.' . $extension;
			Request::file('file')->move('homework_files', $filename);
		}

		$userLesson = UserLesson::getInstance(Auth::user()->id, $this->request['lesson_id']);

		if(!$userLesson) {
			$userLesson = UserLesson::create([
				'user_id' => Auth::user()->id,
				'lesson_id' => $this->request['lesson_id'],
				'mark' => 0
				]);
		}

		$userLesson->addHomework($filename, $this->request['comment']);
		return Redirect::back();
	}

	public function getDiscussions() {
		$courses = Course::all();
		$discussions = Discussion::all();

		return view('profile.discussions', compact('courses', 'discussions'));
	}




}