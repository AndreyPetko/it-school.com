<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class DiscussionMessage extends Model
{
	protected $table = 'discussion_messages';
	protected $fillable = ['discussion_id', 'text', 'user_id'];

	public function scopeWithUser($query) {
		$query->select('*', 'discussion_messages.id as messageId')
		->leftjoin('users', 'users.id', '=' , 'discussion_messages.user_id');
	}

}