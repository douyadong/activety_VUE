<?php require_once("../public/global.php")?>
<?php require_once("wapConfig.php")?>
<?php
	ob_start();
?>
<!doctype html>
<html>
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
		<link rel="stylesheet" type="text/css" href="<?php echo $CURRENT_STATIC_DOMAIN ?>/public/css/alwap.min.css"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/css/wap.min.css"></link>			
	</head>
	<body>
		<?php
			foreach ($config["imgs"] as $img) {
		?>
			<img src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/wap/<?php echo $img['url']?>" <?php echo empty($img["original-demesion"])?"":("data-original-demension='" . $img["original-demesion"] . "' data-shapes='" . $img["shapes"] . "'") ?> />
		<?php
			}
		?>	

		<div class="reserve-form">
			<div class="content">
				<h3>看房预约</h3>
				<div class="item">
					<label>姓名:</label> <input type="text" placeholder="请输入姓名" name="name" />
				</div>
				<div class="item">
					<label>电话:</label> <input type="text" placeholder="请输入电话号码" name="phoneNumber"/>
				</div>
				<div class="item">
					<label>验证码:</label> <input type="text" placeholder="请输入验证码" name="verifyCode" /><button class="sendCodeBtn" id="sendCodeBtn">获取验证码</button>
				</div>
				<p class="tips-txt"></p>
				<div class="footer">
					<button class="confirmReserveBtn">确认预约</button>
					<button class="cancelBtn">取消</button>
				</div>
			</div>
		</div>

		<div class="w-dialog success-dialog">
		    <div class="w-alert-box success-box">
		        <p class="text">看房预约</p>
		        <p class="fz14">您的预约已成功，我们的新房顾问将马上与您联系!</p>
		        <span id="closeSuccess" class="close-success">确   定</span>
		    </div>
		</div>	

		<div id="joinDialog" style="display:none">   
			<div style="background:rgba(0,0,0,.4);bottom:0;left:0;right:0;position:fixed;top:0;z-index:9998"></div>
			<div style="padding:0 10% 10% 10%;z-index:9999;position:fixed;width:100%;top:30px">
				<img src='<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"] . '/images/wap/popup.png'?>'/>
		    </div>  
		</div>
	</body>	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/config.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/app.min.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/activitylist/wap.min.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"] . '/js/wap.min.js'?>"></script>
	<?php require_once("../public/components/wap/wechatshare.php") ; ?>
	<?php require_once("../public/components/GA_Baidu_statistic.php");?>
</html>
<?php
	require_once("../public/components/save_file.php");
	ob_end_flush();
?>