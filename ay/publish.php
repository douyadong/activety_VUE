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
            <div class="choose-box">
                <div class="icon">+</div>
                <img src="" alt="img">
            </div>

            <div class="location-info">
                <img class="icon" src="images/34-min.png" alt="icon">
                <span class="country">中国</span>
                <span class="city">上海</span>
            </div>

            <div class="form">
                <div class="row">
                    <label for="">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:</label>
                    <input type="text" max-length="20" id="txtUserName"/>
                </div>
                <div class="row">
                    <label for="">联系电话:</label>
                    <input type="text" max-length="20" id="txtMobile"/>
                </div>

                <div class="button">
                     <div class="left">
                          <img class="bulb" src="images/bulb.png" alt="bulb">
                          <span>上传照片点亮城市</span>
                     </div>
                     <div class="seperator-line">
                     </div>
                     <div class="right">
                         <img class="right_arrows" src="images/right_arrows.png" alt="arrows">
                     </div> 
                </div>

                <div class="button uploading">
                     <div class="left">                         
                          <span>努力上传中...</span>
                     </div>                    
                </div>
            </div>
		</div>

	<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/jquery-starfield.min.js" ?>"></script>
	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/" . $router['page_type'] . ".min.js" ?>"></script>
	<?php 
	    }
	?>       

	<!--微信分享-->
	<input type="hidden" id="wechatTitle" value="<?php echo $config["wechat_title"]?>"/>
	<input type="hidden" id="wechatContent" value="<?php echo $config["wechat_content"]?>"/>
	<input type="hidden" id="wechatImgUrl" value="<?php echo $confs["module_img_path"]; ?>/wechat_shared.jpg"/> 
    <!--百度地图脚本-->
    <script src="http://api.map.baidu.com/api?v=2.0&amp;ak=qNYWrlPhhs31jXqbHLMnKWrI"></script>
	<!--这里是微信分享的脚本-->        
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wechat-share.min.js"></script> 
	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>