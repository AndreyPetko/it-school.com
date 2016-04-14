<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';
	protected $fillable = ['name', 'text', 'image', 'description', 'url'];


	public static function items() {
		return DB::table('news')->orderBy('id', 'desc')->paginate(3);
	}


	public static function getLast() {
		return DB::table('news')->orderBy('id', 'desc')->take(4)->get();
	}
}