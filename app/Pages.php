<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

	public $timestamps = false;
	protected $table = 'pages';
	protected $fillable = ['title', 'url', 'text'];

}