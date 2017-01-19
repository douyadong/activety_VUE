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
		   <div class="logo">
		   		<img src="<?php echo $confs["module_img_path"]; ?>/wklogo.png" alt="logo">	
		   </div>
		   <div class="title">
			   <img src="<?php echo $confs["module_img_path"]; ?>/title.png" alt="title">	
		   </div>
		   <div class="desc">
		   		<p>有家的地方就是悟空</p>
		   		<p>在这个特殊的欢聚时刻</p>
		   		<p>让我们身着悟空衫</p>
		   		<p>共同点亮属于悟空的足迹地图</p>
		   		<i class="lefttop sprite sprite-32"></i>
		   		<i class="rightbottom sprite sprite-31"></i>
		   		<img class="planet" src="<?php echo $confs["module_img_path"]; ?>/2-min.png" alt="planet">	
		   </div>
		   <div class="lighted">
		   		<img src="<?php echo $confs["module_img_path"]; ?>/bulb.png" alt="bulb">	
		   		已点亮<span class="count"></span>个城市
		   		<img class="planet" src="<?php echo $confs["module_img_path"]; ?>/1-min.png" alt="planet">	
		   </div>
		    <div class="rule">
			    <div class="image">
			    	<img src="<?php echo $confs["module_img_path"]; ?>/award.png" alt="award">	
			    </div>
		    	<p class="title">活动规则</p>
				<p class="time">活动时间：即日起至2017年2月10日</p>
				<p class="requirement">活动要求：身着悟空衫（冬装或者夏装均可），与当地城市的地标性建筑或景点或者WP门店合影并上传；成功后还可将页面分享至亲朋好友为你点赞。<span>（每人最多上传5张照片）</span></p>
		   </div>
		   <div class="hot">
		   </div>
		   <div class="new" pageindex="0" pagesize="10">
		   </div>
		</div>
		<div class="operation">
			<div class="add">
				<span class="sprite sprite-20"></span>
				<span>上传照片</span>
			</div>
			<div class="my">
				<span class="sprite sprite-21"></span>
				<span>我的图片</span>
			</div>
		</div>
		<div class="dialog photo-dialog">
		</div>
		<div class="dialog award-dialog">
			<p class="title">活动奖品</p>
			<i class="sprite sprite-4"></i>
			<div>
				<i class="sprite sprite-5"></i>
				<p>1、照片合乎要求且成功上传者，均可以获赠一个大礼包。</p>
			</div>
			<div>
				<p>特别鸣谢</p>
				<p>以下赞助商提供的礼品</p>
				<div class="company">
					<img src="<?php echo $confs["module_img_path"]; ?>/baidu.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/yin.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/lechebang.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/ysmy.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/ruikang.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/zhongliang.png" alt="title">
					<img src="<?php echo $confs["module_img_path"]; ?>/papa.png" alt="title">
				</div>
			</div>
			<div>
				<i class="sprite sprite-6"></i>
				<p>2、照片合乎要求且首位成功点亮中国的省、直辖市以及海外国家的参与者，可获赠定制版的悟空吉祥物异型交通卡一张。</p>
			</div>
			<div>
				<i class="sprite sprite-7"></i>
				<p>3、照片合乎要求且获点赞数最高的前10位参与者，还可获赠100元话费。</p>
			</div>
			<span>*以上所有奖项可叠加 本活动最终解释权归悟空找房所有</span>
		</div>

	<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/jquery.pullload.min.js" ?>"></script>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/jquery-starfield.min.js" ?>"></script>    

	<!--微信分享-->
	<input type="hidden" id="wechatTitle" value="<?php echo $config["wechat_title"]?>"/>
	<input type="hidden" id="wechatContent" value="<?php echo $config["wechat_content"]?>"/>
	<input type="hidden" id="wechatImgUrl" value="<?php echo $confs["module_img_path"]; ?>/wechat_shared.jpg"/> 
	<input type="hidden" id="wechatLinkUrl" value=""/> 

	<!--这里是微信分享的脚本-->        
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/ay/js/wechat-share.min.js"></script> 

	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/" . $router['page_type'] . ".min.js" ?>"></script>
	<?php 
	    }
	?>   


	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>