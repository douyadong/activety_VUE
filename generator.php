<meta charset="utf-8">
<?php
	function get_extension($fileName){
		return substr(strchr($fileName,'.'),1);
	}

	//获取当前请求的域名
	//$uri_components = explode("/", $_SERVER["PHP_SELF"]) ;
	//var_dump($uri_components);
	$domainName = $_SERVER['SERVER_NAME'];
	$excludeDirs = array('.','..','build','public','activitylistbuild','.git','node_modules');
	$excludeFiles = array('config.php');
	$dirs = array();
	$urls = array();
	//遍历当前目录
	$dir = ".";
	if($dh = opendir($dir)){
		//echo "遍历目录成功";
		while($file = readdir($dh)){//遍历根目录，收集子目录
			echo "找到" . $file . '<br/>';
			if(is_dir($file)){
				//去除不访问的目录
				if(in_array($file, $excludeDirs)){
					echo "$file 被排除<br/>";
				}else{
					$dirs[] = $file;					
				}				
			}else{
				echo "$file 不是目录<br/>";
			}
		}

		echo "<br/><hr/>";
		var_dump($dirs);
		//遍历收集的子目录
		foreach ($dirs as $key => $value) {
			//echo "$value<br/>";
			$dh2 = opendir($value);
			while($file2 = readdir($dh2)){
				echo "访问$file2 <br/>";
				if(!is_dir($file2)){
					$extension = get_extension($file2);	
					echo "$file2 后缀名 $extension<br/>";				
					if($extension == 'php' && !in_array($file2, $excludeFiles)){
						//$url = 'http://' . $domainName . '/' . $value . '/' . $file2;
						$url = "$value/$file2";
				$urls[] = $url;

					}
					echo "$file2 是文件<br/>";
				}else{
					echo "$file2 不是文件<br/>";
				}				
				//echo $url . '<br/>';
			}
		}

		echo "<br/></hr>";
			
	}else{
		echo "遍历目录失败";
	}
?>

<?php
	foreach ($urls as $key => $value) {
?>
	<img src="<?php echo $value;?>" />
<?php	
	}
?>