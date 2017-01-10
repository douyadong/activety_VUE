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
	<img src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"]?>/images/wap/WechatIMG8.jpeg">
</div>

</body>
</html>

<?php require_once("../public/components/save_file.php");?>
<?php 
	ob_end_flush();
?>
<!--保存内容到当前请求同名的html文件中,比如请求的是web.php，那么会生成web.html-->
