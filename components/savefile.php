<?php
function save_file($data){
	$filename = basename($_SERVER["PHP_SELF"],'.php') . '.html';
	return file_put_contents($filename,$data);
}

?>