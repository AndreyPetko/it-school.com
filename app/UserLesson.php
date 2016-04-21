<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class UserLesson extends Model
{
	protected $table = 'user_lessons';
	protected $fillable = ['user_id', 'lesson_id', 'mark'];


	public static function getInstance($user_id, $lesson_id) {
		return self::where('user_id', $user_id)->where('lesson_id', $lesson_id)->first();
	}

	public function addHomework($filename, $comment) {
		DB::table('user_lesson_homeworks')->insert([
			'user_lesson_id' => $this->id,
			'file_path' => $filename,
			'comment' => $comment
			]);
	}

	public function files() {
		return DB::table('user_lesson_homeworks')->where('user_lesson_id', $this->id)->get();
	}

	public static function withLessonInfo() {
		return DB::table('user_lessons')
		->select('users.name as userName', 'lessons.name as lessonName', 'courses.name as courseName', 'user_lessons.id')
		->leftjoin('lessons', 'lessons.id', '=' , 'user_lessons.lesson_id')
		->leftjoin('users', 'users.id', '=' , 'user_lessons.user_id')
		->leftjoin('courses', 'courses.id', '=' , 'lessons.course_id')->get();
	}

	public function getHomeworks() {
		return DB::table('user_lesson_homeworks')->where('user_lesson_id', $this->id)->get();
	}

	public function setCurrentToNext() {
		$lesson = DB::table('lessons')
		->select('lessons.position', 'lessons.course_id')
		->leftjoin('user_lessons', 'lessons.id', '=', 'user_lessons.lesson_id')
		->where('user_lessons.id', $this->id)
		->first();

		$currentPosition = DB::table('user_courses')
		->where('course_id', $lesson->course_id)
		->where('user_id', $this->user_id)
		->value('current_lesson_id');

		if($lesson->position == $currentPosition) {
			$currentPosition++;
			DB::table('user_courses')
			->where('course_id', $lesson->course_id)
			->where('user_id', $this->user_id)
			->update(['current_lesson_id' => $currentPosition]);
		}
	}

	public function getMark() {
		if($this->mark) {
			return $this->mark;
		}
	}

}