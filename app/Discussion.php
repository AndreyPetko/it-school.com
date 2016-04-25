<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
	protected $table = 'discussions';
	protected $fillable = ['course_id', 'lesson_id', 'title'];

}