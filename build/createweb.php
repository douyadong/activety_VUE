<?php
	$web_content = <<<web_content
	<?php require_once("config.php");?>
	<?php
		ob_start();
	?>
	<?php 
		/*
		把页面分为三块：head、body和foot
		head负责head标签内容的创建，页面所需的css在此加载
		body负责body标签内容的创建，页面的主题内容
		foot负责foot标签内容的创建，页面所需的js在此加载
		*/
		require_once("../components/webhead.php");
		require_once("../components/webbody.php");
		require_once("../components/webfoot.php");
		require_once("../components/savefile.php");
		\$info = ob_get_contents();//得到缓冲区的内容并且赋值给\$info  
		save_file(\$info);//保存
	?>
web_content;

	file_put_contents("../$activity_name/web.php", $web_content);
?>