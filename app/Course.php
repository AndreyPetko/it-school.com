<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'courses';
	protected $fillable = ['name', 'logo', 'description', 'price', 'premium', 'direction_id', 'url', 'fullDescription'];


	public function lessons() {
		return $this->hasMany('App\Lesson');
	}


	public static function getWithLessonsCount() {
		return DB::select('SELECT  courses.*, courses_directions.name as directionName, count(lessons.id) as lessonsCount FROM courses
			LEFT JOIN lessons ON lessons.course_id = courses.id
			LEFT JOIN courses_directions ON courses.direction_id = courses_directions.id
			GROUP BY courses.id');
	}

	public static function getTop($count) {
		return self::orderBy('rate', 'desc')->take($count)->get();
	}

	public function scopeUrl($query, $url) {
		$query->where('url', $url);
	}



	public static function groupByDirection($directions) {
		foreach ($directions as $key => $direction) {
			$courses = self::where('direction_id', $direction->id)->get();
			if($courses) {
				$direction['courses'] = $courses;
			} else  {
				unset($directions[$key]);
			}
		}

		return $directions;
	}


}