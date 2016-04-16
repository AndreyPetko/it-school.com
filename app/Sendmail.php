<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Sendmail extends Model
{

	public $timestamps = false;
	protected $table = 'sendmail';
	protected $fillable = ['user_id', 'email'];

}