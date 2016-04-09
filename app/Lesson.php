<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $table = 'lessons';
	protected $fillable = ['name', 'text', 'video_link', 'home_text', 'course_id', 'position'];


	public function course() {
		return $this->belongsTo('App\User');
	}


}