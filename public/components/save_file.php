<!--保存内容到当前请求同名的html文件中,比如请求的是web.php，那么会生成web.html-->
<?php
	function save_file($data){
		$filename = basename($_SERVER["PHP_SELF"],'.php') . '.html';
		return file_put_contents($filename,$data);
	}

	$data = ob_get_contents();
	save_file($data);
?>