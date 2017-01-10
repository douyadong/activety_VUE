<?php require_once("../public/global.php");?>
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
<title>新技术下最酷炫的虚拟看房</title>
<meta name="keywords" content="VR看房,宝山二手房,梅陇二手房,浦东二手房,悟空找房二手房">
<meta name="description" content="悟空找房联合爱空间推出上海最具性价比的十套二手房房源VR技术看房,上海各大板块热门二手房尽收眼底,各种户型大小样板间装修效果,此时在悟空找房即可身临其境,足不出户看房,线上看房就在悟空找房">

<style>
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    margin: 0;
    padding: 0;
}

.clearfix {*zoom:1;}
.clearfix:before,.clearfix:after {display: table;content: " ";}
.clearfix:after {clear: both;}
img{
	display: block;
	width: 100%;
}
.wap-module{}
.wap-module a{display: block;}
.wap-module .linkBox{ position: relative;}
.wap-module .linkBox .padding3{padding:0 3%;}
.wap-module .linkBox .linklist{
	position: absolute;
	top: 0;
	bottom: 0;
	width: 100%;
}
.wap-module .linkBox .linklist>a{
	float: left;
	display: inline;
	width: 28%;
	height: 100%;
}
.wap-module .linkBox .linklist>a.a1{
	margin: 0 7% 0 15%; 
}
.wap-module .linkBox .linklist>a.a2{
	margin: 0 15% 0 7%; 
}
.wap-module .linkBox .linklist>a.link{
	width: 13%;
	margin-left: 61%;
}
.wap-module .linkBox .linklist>a.b1{
	width: 26%;
	margin-left: 6%;
}
.wap-module .linkBox .linklist>a.b2{
	width: 26%;
	margin-left: 5%;
}
.wap-module .linkBox .linklist>a.b3{
	width: 26%; 
	margin-left: 5%;
}
</style>
</head>

<body>
<div class="wap-container">
	<div class="wap-module">
		<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/01.jpg">
		<div class="linkBox">
			<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/02.jpg">
			<div class="linklist clearfix">
				<a class="link" href="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/akj.html"></a>
			</div>
		</div>
		<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/03.jpg">
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/11.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/12.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/f27a2eb7cc808203.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02572235"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/21.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/22.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/df44d6c6a3d1d75f.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02613132"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/31.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/32.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/6d0409ca2ba5e9fc.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02623979"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/41.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/42.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/77b678be83661034.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02643008&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/51.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/52.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/7c306188bddd92cb.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02666790&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/61.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/62.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/a5a06133102c3558.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02683225&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/71.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/72.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/17dce4598935ffbe.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02696469&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/81.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/82.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/30e838c4c4a04185.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02582418"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/91.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/92.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/9c35558144c43182.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02706160&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/101.jpg"/>
		<div class="linkBox">
			<img class="" src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/102.jpg"/>
			<div class="linklist clearfix">
				<a class="a1" href="http://m.wkzf.com/shanghai/esf/14bf0180d12311ce.html?cityId=43"></a>
				<a class="a2" href="http://admin.3vjia.com/PMC/Panorama/Show360Test.aspx?SchemeId=02702682&from=singlemessage&isappinstalled=0"></a>
			</div>
		</div>
	</div>
	<div class="wap-module">
		<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/b1.jpg">
		<div class="linkBox">
			<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/b2.jpg">
			<div class="linklist clearfix">
				<a class="b1" href="http://m.wkzf.com/shanghai/esf"></a>
				<a class="b2" href="http://m.wkzf.com/shanghai"></a>
				<a class="b3" href="http://m.wkzf.com/shanghai/xflist"></a>
			</div>
		</div>
		<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/b3.jpg">
	</div>
</div>


<!--微信分享，wap才有-->        
<!--微信分享-->
<input type="hidden" id="wechatTitle" value="万万没想到，二手房还能这么看？"/>
<input type="hidden" id="wechatContent" value="良心推荐性价比房源+虚拟看房"/>
<input type="hidden" id="wechatImgUrl" value="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/weixin.jpeg"/>

<!--页面脚本区域-->
<!--这里是微信分享的脚本-->        
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wechat-share.min.js"></script>

<script>
	var controller = new Controller();
	/*--GA-h5--*/
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-68700668-2', 'auto');
	ga('send', 'pageview');
	/*--统计H5--*/
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

<?php require_once("../public/components/save_file.php");?>
<?php 
	ob_end_flush();
?>
<!--保存内容到当前请求同名的html文件中,比如请求的是web.php，那么会生成web.html-->
