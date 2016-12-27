	<?php require_once("dsxConfig.php");?>
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
		    <img src="<?php echo $confs["module_img_path"]; ?>/bg_dsx.jpg" alt="" />
	    	<div class="phone">
	    		<span>手机</span>
		    	<input type="text" id="phoneNum">
	    	</div>
	    	<div class="operation">
		    	<button class="submit">提交</button>
	    	</div>
	    	<span class="error hide"></span>
		</div>
		<div class="qrcode hide">
			<p>长按关注下方二维码进入大师兄</p>
			<img class="code" src="<?php echo $confs["module_img_path"]; ?>/qrcode.jpg" alt="" />
			<img class="logo" src="<?php echo $confs["module_img_path"]; ?>/logo.png" alt="" />
		</div>


	<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>


	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/jssrc/" . $router['page_type'] . ".js" ?>"></script>
	<?php 
	    }
	?>       

	<!--微信分享-->
	<input type="hidden" id="wechatTitle" value="<?php echo $config["wechat_title"]?>"/>
	<input type="hidden" id="wechatContent" value="<?php echo $config["wechat_content"]?>"/>
	<input type="hidden" id="wechatImgUrl" value="<?php echo $confs["module_img_path"]; ?>/wechat_shared.jpg"/> 

	<!--这里是微信分享的脚本-->        
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wechat-share.min.js"></script> 
	
	<!--GA-h5-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-68700668-2', 'auto');
      ga('send', 'pageview');
    </script>
    <!--统计H5-->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?691114119912df4f51b1435e553b4a79";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>

	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>