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
	//$config = print_r($_POST);

	$activityName = $_POST["activityName"];
	$matchCss = $_POST["matchCss"];
	$matchJs = $_POST["matchJs"];
	$errorArray = array();

	if(is_dir("../../$activityName")){
        deldir("../../$activityName");
    }
    if(mkdir("../../$activityName") && mkdir("../../$activityName/less") && mkdir("../../$activityName/images") && 
        mkdir("../../$activityName/jssrc")){                        
            //生成config.php
            require_once('create_config.php');

            //生成web.php
            require_once('create_web.php');
            
            //生成wap.php
            require_once('create_wap.php');

            //创建活动相关的资源（css和js文件），放在活动目录中
            //require_once('create_match_resources.php');    
            if($matchCss){
            	$file = fopen("../../$activityName/less/web.less",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($error_array,"创建文件:web.js失败");
				}
			$file = fopen("../../$activityName/less/wap.less",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($error_array,"创建文件:wap.less失败");
				}
            }   

            if($matchJs){
            	$file = fopen("../../$activityName/jssrc/web.js",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($errorArray,"创建文件:web.js失败");
				}
				$file = fopen("../../$activityName/jssrc/wap.js",'wb');
				if($file){
					fclose($file);	
				}else{
					array_push($errorArray,"创建文件:wap.js失败");
				}
            }                               
    }else{
        array_push($errorArray,"创建活动目录失败");
    }

    echo '{"status":1}';//成功
?>