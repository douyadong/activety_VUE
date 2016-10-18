<?php require_once("../public/global.php")?>
<?php require_once("webConfig.php")?>
<?php
	ob_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $config["page_title"] ; ?> - 悟空找房</title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo $CURRENT_STATIC_DOMAIN; ?>/public/css/alweb.min.css"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name'];?>/css/web.min.css"></link>
	</head>
	<body>
		<?php
			foreach ($config["imgs"] as $img) {
		?>
			<img src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/web/<?php echo $img['url']?>" <?php echo empty($img["original-demesion"])?"":("data-original-demension='" . $img["original-demesion"] . "' data-shapes='" . $img["shapes"] . "'") ?> />
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
<div class="success-dialog">
    <div class="success-dialog-bg"></div>
    <div class="w-alert-win" style="background: url('<?php echo $CURRENT_STATIC_DOMAIN?>/public/images/reserve_success.jpg') no-repeat scroll;"><span id="closeSuccess"></span></div>
</div>
<div id="joinDialog" style="display:none">   
	<div style="background:rgba(0,0,0,.4);bottom:0;left:0;right:0;position:fixed;top:0;z-index:9998"></div>
	<div style="padding:0 30% 30% 30%;z-index:9999;position:fixed;width:100%;top:60px">
		<img src='<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"] . '/images/web/popup.png'?>'/>
    </div>  
</div>
	</body>	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN;?>/config.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN;?>/public/js/app.min.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN;?>/public/js/activitylist/web.min.js"></script>
	<script src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/js/web.min.js"></script>
	<?php require_once("../public/components/GA_Baidu_statistic.php");?>
</html>
<?php
	require_once("../public/components/save_file.php");
	ob_end_flush();
?>