<?php 

namespace App;

class Image {

	public $image = [];
	public $name = '';

	public function __construct($image) {
		$this->image = $image;
	}


	public function toImageFolder() {
		$this->image->move('images', $this->image->getClientOriginalName());
		$this->name = $this->image->getClientOriginalName();
	}


	public static function deleteImage($oldImage) {
		$filename = './images/' . $oldImage;

		if(file_exists($filename)) {
			unlink($filename);
		}
	}


	public function hasFile() {
		return !empty($this->image) && $this->image->isValid();
	}

	public function getName() {
		return $this->name;
	}

}