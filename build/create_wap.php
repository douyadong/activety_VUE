<?php
	$wap_content = <<<wap_content
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
		require_once("../public/components/wap/head.php");
		require_once("../public/components/wap/body.php");
		require_once("../public/components/wap/foot.php");
		require_once("../public/components/save_file.php");

		ob_end_flush();
	?>
wap_content;

	file_put_contents("../$activity_name/wap.php", $wap_content);
?>