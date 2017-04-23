<?php
	function uploadImage($type) {
		$target_dir;
		if ($type == 'avatar') {
			$target_dir = "../images/users/";
		}
		
		$imageFileType = pathinfo($_FILES[$type]["name"], PATHINFO_EXTENSION);
		$file_name = hash("sha256", $_FILES[$type]["name"] . time() . rand());
		$target_file = $target_dir . $file_name . "." . $imageFileType;
		
		$check = getimagesize($_FILES[$type]["tmp_name"]);
		// Check if the file is an image, if it already exists, and if its size is < 500KB
		if ($check !== false && !file_exists($target_file) && $_FILES[$type]["size"] <= 500000 &&
			($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif")) {
			
			if (move_uploaded_file($_FILES[$type]["tmp_name"], $target_file)) {
				return $file_name . "." . $imageFileType;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}	
	}
	
	function removeImage($type, $url) {
		$target_dir;
		if ($type == 'avatar') {
			$target_dir = "../images/users/";
		}
		
		unlink($target_dir . $url);
	}
?>	