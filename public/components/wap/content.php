<!--wapcontainer content-->  
<div class="content">
<?php
	$dir = 'images/wap';	
	if(is_dir($dir)){
		if($dh = opendir($dir)){
			while($file = readdir($dh)){
				if($file != '..' && $file != '.'){					
					echo "<img class='lazy' data-src='$STATIC_DOMAIN/activity/" . $router["controller"] . "/$dir/$file' />";			
				}
			}
		}
	}

	require_once('reservefixed.php');
?>
</div>