<!--wapcontainer content-->  
<div class="content">
<?php	
	//读取活动目录下的images/wap目录中的图片
	$dir = 'images/wap';	
	if(is_dir($dir)){
		if($dh = opendir($dir)){
			require_once('../public/components/get_extension.php');
			require_once('../public/components/is_valid_image_extension.php');
			$arr = array();
			while($file = readdir($dh)){
				$extension_name = get_extension($file);
				
				//判断是否合法的图片后缀名
				if($file != '..' && $file != '.' && is_valid_image_extension($extension_name)){			
					array_push($arr,$file);									
				}				
			}
			sort($arr);
			foreach($arr as $key => $val){
				echo "<img class='lazy' data-src='$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/$dir/$val' />";
			}			
		}
	}

    if($config["include_reserve"]) {//根据配置决定是否包含预约按钮
    		require_once('reservefixed.php');
 	} 
 ?> 
</div>