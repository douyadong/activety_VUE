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
				<p class="time">活动时间：即日起至2017年2月20日</p>
				<p class="requirement">活动要求：身着悟空衫（冬装或者夏装均可），与当地城市的地标性建筑或景点或者WP门店合影并上传；成功后还可将页面分享至亲朋好友为你点赞。<span>（没人最多上传5张照片）</span></p>
		   </div>
		   <div class="hot">
		   		<p class="title">热门</p>
		   		<!-- <div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div> -->
		   </div>
		   <div class="new">
		   		<p class="title">最新</p>
		   		<!-- <div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div>
		   		<div class="image">
		   			<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
		   			<div class="location">
			   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
						<i class="triangel"></i>
		   			</div>
		   			<div class="zan">
		   				<div class="left">
		   					<img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">	
		   				</div>
		   				<div class="right">
		   					<span class="count">147</span>
		   					<span class="name">测试测试</span>
		   				</div>
		   			</div>
		   		</div> -->
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
			<!-- <i class="close sprite sprite-4"></i>
			<div class="image">
				<img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt="">
			</div>
			<div class="location">
	   			<span class="content"><i class="sprite sprite-15"></i><span>中国.上海中国.上海中国.上海</span></span>
				<i class="triangel"></i>
   			</div>
			<div class="vote">
				<p class="name">张三</p>
				<p class="zan"><img src="<?php echo $confs["module_img_path"]; ?>/heart1.png" alt="heart">点击为TA投票</p>
				<p class="count">目前票数<span>147</span>	</p>
			</div> -->
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
				<p>2、照片呵护要求且首位成功点亮中国的省、直辖市以及海外国家的参与者，可获赠定制版的悟空吉祥物异型交通卡一张。</p>
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
	
	<!--GA-h5-->
<!--     <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-68700668-2', 'auto');
      ga('send', 'pageview');
    </script> -->
    <!--统计H5-->
    <!-- <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?691114119912df4f51b1435e553b4a79";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script> -->

	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>