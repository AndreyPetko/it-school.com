<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Request;
use App\Course;
use App\Image;
use Redirect;
use App\News;
use App\Keyval;


class VariableController extends Controller
{
	public function __construct() {
		$this->middleware('isAdmin');
		$this->request = Request::all();
		unset($this->request['_token']);
	}

	public function getIndex() {
		$vars = Keyval::all();
		return view('admin.variables.varsList', compact('vars'));
	}

	public function getEdit($key) {
		$varItem = Keyval::getByKey($key);
		return view('admin.variables.varEdit', compact('varItem', 'key'));
	}

	public function postEdit($key) {
		Keyval::updateByKey($key, $this->request);
		return Redirect::to('admin/variables');
	}
}