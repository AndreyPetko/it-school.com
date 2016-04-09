<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Request;



class AdminController extends Controller
{

	public function __construct() {
		// $this->middleware('isAdmin');
		$this->request = Request::all();
		unset($this->request);
	}


	public function getIndex() {
		return view('admin.index');
	}

}
