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
        <link rel="stylesheet" href="http://cdn01.wkzf.com/fe_public_library/wkzf/js/util/swiper/dist/css/swiper.min.css">
		<?php
		    if($config["match_stylesheet"]) {
		?>
		<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/css/<?php echo $router["page_type"]?>.min.css">
		<?php } ?>
    </head>
    <body>
    	<div class="wrapper">
            <div class="title">
               <img src="<?php echo $confs["module_img_path"]; ?>/title.png" alt="title">   
            </div>   
            <div class="details">
                 <img class="arrow" src="images/success_bg1.png" alt="success_bg1"/>
                 <div class="img-box">
                    <i class="sprite sprite-27"></i>
                    <div  class="swiper-container">
                        <div class="swiper-wrapper">
                            
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                 </div>
            </div>
            <div class="note">
                <span>点击照片为TA点赞</span>
                <img class="bulb" src="images/hand.png" alt="hand">
            </div>
            <div class="desc">
                <div class="left">
                    <img class="bulb" src="images/timeline.png" alt="timeline">
                </div>
                <div class="right">
                    <p class="line1">2015年：上海出现第一家WP门店。</p>
                    <p class="line2">2016年：悟空蓝的身影开始蔓延在上海、杭州、苏州、宁波、南京、成都……等数十个城市</p>
                    <p class="line3">2017年：“百城万店”计划的全面启动……</p>
                </div>
            </div>
            <div class="button">
                 <div class="left">
                      <img class="bulb" src="images/bulb.png" alt="bulb">
                      <span>查看活动详情</span>
                 </div>
                 <div class="seperator-line">
                 </div>
                 <div class="right">
                     <img class="right_arrows" src="images/right_arrows.png" alt="arrows">
                 </div> 
            </div>
		</div>
        <div class="dialog photo-dialog">
        </div>

	<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/jquery-starfield.min.js" ?>"></script>

    <script src="http://cdn01.wkzf.com/fe_public_library/wkzf/js/util/swiper/dist/js/swiper.min.js"></script>

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
  
	<!--这里是微信分享的脚本-->        
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wechat-share.min.js"></script>
	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>