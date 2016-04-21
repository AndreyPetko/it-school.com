<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'lesson_messages';
	protected $fillable = ['user_id', 'lesson_id', 'message', 'admin'];



	public function scopeCurrent($query,$user_id, $lesson_id) {
		$query->where('user_id', $user_id)->where('lesson_id', $lesson_id)->orderBy('lesson_messages.created_at', 'desc');
	}

	public function scopeUserName($query) {
		$query->leftjoin('users', 'users.id', '=', 'lesson_messages.user_id');
	}

}