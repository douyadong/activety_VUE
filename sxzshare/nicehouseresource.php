	<?php require_once("nhrConfig.php");?>
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
		   <p class="title">精选房源，有图有真相 SO EASY</p>
		   <p>悟空找房精选房源的点击量是普通房源的 <span class="num">30</span> 倍。</p>
		   <p>是什么造成了这样的情况？仅仅是因为在悟空找房房源列表页置顶显示。</p>
		   <p class="sub-title">让我们探求更深层次的原因：</p>
		   <p><span class="num">93%</span> 的找房用户认为，是否有图片是一项关键性因素，会让他们决定是否与经纪人取得联系。</p>
		   <p><span class="num">52%</span> 的找房用户会放弃访问该小区，并且再也不会访问，仅仅因为不喜欢线上的小区图片质量。</p>
		   <p><span class="num">42%</span> 的找房用户会根据图片质量来判断对该小区的印象。</p>
		   <p><span class="num">96%</span> 的找房客户认为看视频对做出线上约看决定非常有帮助。</p>
		   <p>在房产网站房源页，将图片替换成视频之后，用户约看转化率可以提升 <span class="num">12.62%</span>。</p>
		   <p><span class="num">58%</span> 的找房客户认为展示房屋视频的经纪人更值得信赖。</p>
		   <p><span class="num">77%</span> 的找房客户表示，自己在看房时会看相关卖点。</p>
		   <p><span class="num">67%</span> 的找房客户会根据卖点的内容决定是否前往该小区看房。</p>
		   <p class="sub-title">那如何成为精选房源，来提高房屋的点击数和客户约看数。</p>
		   <p>实景 ≥ 7 张 (室内 6 张，户型图 1 张)；</p>
		   <p>房屋卖点 ≥ 30 字；</p>
		   <p>业主心态 ≥ 10 字；</p>
		   <p>周边配套 ≥ 10 字。</p>
		   <p class="sub-title">所以拿起您的手机，拍几张照片，认真的用心输入卖点，就能让您的房子一键成为精选房源。</p>
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