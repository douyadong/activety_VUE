<?php
	//获取文件后缀名
	function get_extension($fileName){
		return substr(strchr($fileName,'.'),1);
	}
?>