<?php
	$wap_content = <<<wap_content
	<?php require_once("config.php");?>
	<?php
		ob_start();
	?>
	<!--header-->
	<?php require_once("../components/headWap.php") ?>
	<div class="w-warpper" style="background-color:#f5f5f5;padding-bottom:45px;"> 
	    <img src="images/wap_banner.jpg" />
	    <a href="<?php echo \$confs["hotline"]?>">
	       热线电话：sssssddd
	    </a>
	    <!--页面正文内容部分,图片堆砌-->
	    <?php require_once("../components/wap-content.php") ; ?>  
	    <!--页面底部预约的fixed的按钮-->
	    <?php require_once("../components/wap-reserve-fixed.php") ; ?>  
	 </div> 
	<!--全局的预约框-->
	<?php require_once("../components/wap-reserve-dialogue.php") ; ?>       
	<!--微信预约-->
	<?php require_once("../components/wechat-share.php") ; ?>  
	<!--footer-->
	<?php require_once("../components/footerWap.php") ;  ?>
	<?php
	    \$info = ob_get_contents();       //得到缓冲区的内容并且赋值给\$info  
	    require_once('../components/savefile.php');
	    save_file(\$info);
	    //\$file_name = \$confs["generateHtmlName"] ;
	    //\$file = fopen(\$file_name, 'w') ;
	    //fwrite(\$file, \$info);            
	    //fclose(\$file) ;
	?>

wap_content;

	file_put_contents("../$activity_name/wap.php", $wap_content);
?>