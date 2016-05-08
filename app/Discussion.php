<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
	protected $table = 'discussions';
	protected $fillable = ['course_id', 'lesson_id', 'title'];


	public static function getByFilter($get) {
		if(isset($get['lesson_id'])) {
			return self::where('lesson_id', (int)$get['lesson_id'])->orderBy('created_at', 'desc')->paginate(10);
		}

		if(isset($get['course_id'])) {
			return self::where('course_id', (int)$get['course_id'])->orderBy('created_at', 'desc')->paginate(10);
		}


		return self::orderBy('created_at', 'desc')->paginate(10);
	}

}