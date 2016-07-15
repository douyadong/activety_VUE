<?php	
	//生成额外js和css文件

	if(sizeof($extra_stylesheets) > 0){		
		for($i = 0 ; $i < sizeof($extra_stylesheets) ; $i ++ ) {
			$filename = str_replace('.css','.less',$extra_stylesheets[$i]);
			$file = fopen("../$activity_name/less/" . $filename,'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:$filename失败");
			}			
		}
	}

	if(sizeof($extra_javascripts) > 0){
		for($i = 0 ; $i < sizeof($extra_javascripts) ; $i ++ ) {			
			$file = fopen("../$activity_name/jssrc/" . $extra_javascripts[$i],'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:$extra_javascripts[$i]失败");
			}			
		}
	}
?>