<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\OrderTypes;
use App\Repositories\OrderCourseRepository;

class Order extends Model implements OrderTypes
{
	protected $table = 'orders';
	protected $fillable = ['name', 'surname', 'patronymic', 'email', 'skype', 'birthday', 'totalprice', 'city', 'paid'];

	public function createItem($request, $courses) {
		$id = self::create($request)->id;

		( new OrderCourseRepository(new OrderCourse, $id) )->insertByArray($courses);
	}


	public function getCourses() {
		return DB::table('order_courses')->where('order_id', $this->id)->lists('course_id');
	}


	public function scopeUnpaid($query) {
		$query->where('paid', 0);
	}
}