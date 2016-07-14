<!--保存内容到当前请求同名的html文件中-->
<?php
	function save_file($data){
		$filename = basename($_SERVER["PHP_SELF"],'.php') . '.html';
		return file_put_contents($filename,$data);
	}
?>