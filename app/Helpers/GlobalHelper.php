<?php
use Illuminate\Support\Facades\Mail;
class GlobalHelper {
	public static function checkFileImage($imagePath = ''){
		if(!empty($imagePath) && file_exists(public_path($imagePath)))
			return true;
		else
			return false;
	}

	public static function getImage($imagePath,$path=''){
		$image = ($path?$path:'').$imagePath;
		if(self::checkFileImage($image) && !empty($image))
			return asset($image);
		else
			return asset('uploads/not-found.jpg');
	}	
}
?>