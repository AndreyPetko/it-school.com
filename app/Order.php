<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $fillable = ['name', 'surname', 'patronymic', 'email', 'skype', 'birthday', 'totalprice', 'city', 'paid'];

	public static function createItem($request, $courses) {
		$id = self::create($request)->id;
		foreach($courses as $course) {
			DB::table('order_courses')->insert([
				'order_id' => $id,
				'course_id' => $course->id,
				'course_name' => $course->name,
				'price' => $course->price
				]);
		}
	}


	public function getCourses() {
		return DB::table('order_courses')->where('order_id', $this->id)->lists('course_id');
	}
}