<?php
    function deldir($dir) {
        //先删除目录下的文件：
        $dh=opendir($dir);
        while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
              $fullpath=$dir."/".$file;
              if(!is_dir($fullpath)) {
                  unlink($fullpath);
              } else {
                  deldir($fullpath);
              }
            }
        }   
 
        closedir($dh);
        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }
?>

<?php

	$activityName = $_POST["activityName"];//活动目录
	$matchCss = $_POST["matchCss"];//匹配路由样式
	$matchJs = $_POST["matchJs"];//匹配路由脚本
	$errorArray = array();//错误

    $activityPath = "../../$activityName";
	if(is_dir($activityPath)){//删除已存在活动目录
        deldir($activityPath);
    }
    if(mkdir($activityPath) && mkdir("$activityPath/less") && mkdir("$activityPath/images") && 
        mkdir("$activityPath/jssrc")){                        
            //生成config.php
            require_once('create_config.php');

            //生成web.php
            require_once('create_web.php');
            
            //生成wap.php
            require_once('create_wap.php');

            //创建活动相关的资源（css和js文件），放在活动目录中
            //require_once('create_match_resources.php');    
            if($matchCss){
            	$file = fopen("$activityPath/less/web.less",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($error_array,"创建文件:web.js失败");
				}
			$file = fopen("$activityPath/less/wap.less",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($error_array,"创建文件:wap.less失败");
				}
            }   

            if($matchJs){
            	$file = fopen("$activityPath/jssrc/web.js",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($errorArray,"创建文件:web.js失败");
				}
				$file = fopen("$activityPath/jssrc/wap.js",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($errorArray,"创建文件:wap.js失败");
				}
            }                               
    }else{
        array_push($errorArray,"创建活动目录失败");
    }

    if(count($errorArray) == 0){//成功
        echo '{"status":1}';
    } else{
        echo '{"status":0,"message":"' . $errorArray[0] . '"}';
    }
?>