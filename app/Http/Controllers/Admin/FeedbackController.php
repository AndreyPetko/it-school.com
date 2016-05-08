<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Request;
use App\Course;
use App\Image;
use Redirect;
use App\Bid;
use Carbon\Carbon;
use App\Feedback;
use App\Order;
use App\User;
use DB;
use App\UserOrder;
use App\Review;

class FeedbackController extends Controller
{
	public function __construct() {
		$this->middleware('isAdmin');
		$this->request = Request::all();
		unset($this->request['_token']);
	}


	public function getIndex() {
		$orders = Order::where('user_id', 0)->get();
		$userOrders = UserOrder::withUserInfo()->get();

		$orders = $orders->merge($userOrders);

		$orders = $orders->sortByDesc('created_at');

		$orders->values()->all();


		return view('admin.feedback.orders', compact('orders'));
	}

	public function getFeedback() {
		$feedbacks = Feedback::latest()->get();
		return view('admin.feedback.feedbackList', compact('feedbacks'));
	}

	public function getReviews() {
		$reviews = Review::mySelect()->withCourse()->withUser()->get();
		return view('admin.feedback.reviewsList', compact('reviews'));
	}


	public function getLesson() {
		$bids = Bid::items();
		return view('admin.feedback.bidList', compact('bids'));
	}

	public function postOrderDelete() {
		Order::find($this->request['order_id'])->delete();
		return Redirect::back();
	}

	public function getSetOrderPaid($orderId) {
		$order = Order::find($orderId);

		if(!$order->user_id) {
			$user = new User();
			$user->email = $order->email;
			$user->password = bcrypt('123');
			$user->name = $order->name;
			$user->surname = $order->surname;
			$user->patronymic = $order->patronymic;
			$user->skype = $order->skype;
			$user->birthday = $order->birthday;
			$user->city = $order->city;
			$user->save();
		} else {
			$user = User::find($order->user_id);
		}

		$courses = $order->getCourses();

		$user->addCourses($courses);
		$order->update(['paid' => 1 ]);

		return Redirect::back();
	}
}