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

class FeedbackController extends Controller
{
	public function __construct() {
		$this->middleware('isAdmin');
		$this->request = Request::all();
		unset($this->request['_token']);
	}


	public function getIndex() {
		$bids = Bid::items();
		return view('admin.feedback.bidList', compact('bids'));
	}

	public function getFeedback() {
		$feedbacks = Feedback::latest()->get();
		return view('admin.feedback.feedbackList', compact('feedbacks'));
	}

	public function getOrders() {
		$orders = Order::latest()->get();
		return view('admin.feedback.orders', compact('orders'));
	}

	public function getSetOrderPaid($orderId) {
		$order = Order::find($orderId);

		$user = new User();
		$user->email = $order->email;
		$user->password = bcrypt('123');
		$user->name = $order->name;

		$courses = $order->getCourses();


		DB::beginTransaction();
		$user->save();

		$user->addCourses($courses);


		$order->update(['paid' => 1 ]);
		DB::commit();

		return Redirect::back();
	}
}