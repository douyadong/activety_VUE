<?php	
	//生成匹配路由的资源文件（less和js）
	if($match_js){
		$file = fopen("../$activity_name/jssrc/web.js",'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:web.js失败");
			}
		$file = fopen("../$activity_name/jssrc/wap.js",'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:wap.js失败");
			}
	}

	if($match_css){
		$file = fopen("../$activity_name/less/web.less",'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:web.js失败");
			}
		$file = fopen("../$activity_name/less/wap.less",'wb');
			if($file){
				fclose($file);	
			}else{
				array_push($error_array,"创建文件:wap.less失败");
			}
	}

?>