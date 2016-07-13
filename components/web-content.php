<!--web端图片堆砌部分-->
<?php
	$dir = 'images/web';	
	if(is_dir($dir)){
		if($dh = opendir($dir)){
			while($file = readdir($dh)){
				if($file != '..' && $file != '.'){					
					echo "<img class='lazy' data-src='$dir/$file' />";			
				}
			}
		}
	}
?>