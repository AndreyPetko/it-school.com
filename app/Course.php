<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'courses';
	protected $fillable = ['name', 'logo', 'description', 'price', 'premium'];


	public function lessons() {
		return $this->hasMany('App\Lesson');
	}


	public static function getWithLessonsCount() {
		return DB::select('SELECT  courses.*, count(lessons.id) as lessonsCount FROM courses LEFT JOIN lessons ON lessons.course_id = courses.id GROUP BY courses.id');
	}


}