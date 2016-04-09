<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';
	protected $fillable = ['name', 'text', 'image', 'description', 'url'];


	public static function list() {
		return DB::table('news')->orderBy('id', 'desc')->get();
	}

}