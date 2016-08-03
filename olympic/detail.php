	<?php require_once("config.php");?>
	<?php
		ob_start();
	?>

	<!DOCTYPE html>
	<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no,email=no">
        <meta name="ML-Config" content="fullscreen=yes,preventMove=no">
        <title><?php echo $config["page_title"] ; ?></title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>"> 
        <!-- 引入stylesheet资源 -->
		<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/public/css/app.min.css"?>" />
		<?php
		    if($config["match_stylesheet"]) {
		?>
		<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/css/<?php echo $router["page_type"]?>.min.css">
		<?php } ?>
    </head>
    <body>
	<div class="wrapper">
	    <img src="<?php echo $confs["module_img_path"]; ?>/bg3.jpg" alt="">
	    <div class="flag">
	       
	    </div>
	    <div class="count">
	        <div><img src="<?php echo $confs["module_img_path"]; ?>/golden.png" alt=""><span></span></div>
	        <div><img src="<?php echo $confs["module_img_path"]; ?>/silver.png" alt=""><span></span></div>
	        <div><img src="<?php echo $confs["module_img_path"]; ?>/copper.png" alt=""><span></span></div>
	    </div>    
	</div>
	
		<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>

	<?php
	    if($router["page_type"] === "web"){
	?>
	    <script>
	          //_bd_share_config是提供给下面的share.js使用的
	          window._bd_share_config = {
	            "common": {
	                "bdSnsKey": {},
	                "bdText": "",
	                "bdMini": "2",
	                "bdMiniList": false,
	                "bdPic": "",
	                "bdStyle": "1",
	                "bdSize": "16"
	            },
	            "share": {},
	            "selectShare": {
	                "bdContainerClass": null,
	                "bdSelectMiniList": ["tsina", "tqq", "weixin", "qzone"]
	            }
	          };
	          //web页面中分享QQ、微信和微博
	          with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
	        </script>
	<?php        
	    }
	?>
        
	<!--微信分享，wap才有-->        
	<?php
	    if($router["page_type"] === "wap" && $config["wechat_share"]) {
	      require_once("../public/components/wap/wechatshare.php") ; 
	    }
	?>     
	

	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/jssrc/" . $router['page_type'] . ".js" ?>"></script>
	<?php 
	    }
	?>        
	<?php require_once("../public/components/GA_Baidu_statistic.php");?> 

	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>