<?php 

namespace App;

class Helper {

	public static function toBool($item) {
		if($item) {
			$item = 1;
		} else {
			$item = 0;
		}

		return $item;

	}

	public static function getExtension($filename) {
		return end(explode(".", $filename));
	}

}