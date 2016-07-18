<?php
	
	//判断传入的后缀名是否合法的图片文件后缀名
	function is_valid_image_extension($extension_name){
		$valid_image_extensions = array("jpg","png","jpeg");
		
		foreach($valid_image_extensions as $valid_extension){
			if($valid_extension === $extension_name){
				return true;
			}
		}
		return false;
	}
?>