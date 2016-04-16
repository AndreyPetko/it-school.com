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
}