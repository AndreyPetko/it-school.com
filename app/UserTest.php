<?php


namespace App;
use DB;


use Illuminate\Database\Eloquent\Model;

class UserTest extends Model {
	protected $table = 'user_tests';
	protected $fillable = ['user_id', 'test_id', 'current_position', 'complete', 'mark'];


	public function scopeCurrent($query, $user_id, $test_id) {
		return $query->where('user_id', $user_id)->where('test_id', $test_id);
	}

}