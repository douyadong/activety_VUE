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
	    <div class="bg1">
	        <img src="<?php echo $confs["module_img_path"]; ?>/bg1.jpg" alt="" />
	    </div>

	    <div class="country-container">
	        <img src="<?php echo $confs["module_img_path"]; ?>/bg2.jpg" alt="" />

	        <div class="country-list">
	            <table>
	                <tr>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/1.png"  alt="中国" data-id="1">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/1_active.png"  alt="中国" data-id="1" class="active_img">
	                        <span>中国</span>
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/2.png"  alt="澳大利亚" data-id="2">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/2_active.png"  alt="澳大利亚" data-id="2" class="active_img">
	                        <span>澳大利亚</span>
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/3.png"  alt="德国" data-id="3">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/3_active.png"  alt="德国" data-id="3" class="active_img">                        
	                        <span>德国</span>
	                    </td>
	                </tr>
	                <tr class="sep"></tr>
	                <tr>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/4.png"  alt="巴西" data-id="4">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/4_active.png"  alt="巴西" data-id="4" class="active_img">
	                        <span>巴西</span>
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/5.png"  alt="美国" data-id="5">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/5_active.png"  alt="美国" data-id="5" class="active_img">
	                        <span>美国</span>
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/6.png"  alt="英国" data-id="6">
	                        <img src="<?php echo $confs["module_img_path"]; ?>/6_active.png"  alt="英国" data-id="6" class="active_img">
	                        <span>英国</span>
	                    </td>
	                </tr>
	                <tr class="sep">
	                   
	                </tr>
	                <tr class="sep"></tr>
	                <tr class="medal">
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/golden.png"  alt="金牌">
	                        <input type="tel" name="" id="txtGolden">
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/silver.png"  alt="银牌">
	                        <input type="tel" name="" id="txtSilver">
	                    </td>
	                    <td class="sep"></td>
	                    <td>
	                        <img src="<?php echo $confs["module_img_path"]; ?>/copper.png"  alt="铜牌">
	                        <input type="tel" name="" id="txtCopper">
	                    </td>
	                </tr>
	            </table>         
	        </div>
	        <a href="javascript:void(0)" class="btnSubmit"></a>
	    </div>  
	</div>
	
	<!--wap端预约的弹窗-->
	<div class="w-dialog" id="Success">
	    <div class="w-alert-box success-box">
	        <p class="text">看房预约</p>
	        <p class="fz14">您的预约已成功，我们的新房顾问将马上与您联系!</p>
	        <span id="closeSuccess" class="close-success">确   定</span>
	    </div>
	</div>
	<div class="w-dialog" id="yyForm"> 
	    <div class="w-alert-box">
	        <p class="text">联系信息</p>
	        <div class="form">
	            <div class="item">
	                <span>姓名：</span>
	                <div class="input-box">
	                    <input type="text" maxlength="10" class="name" id="custName" placeholder="请输入姓名">
	                </div>
	            </div>
	            <div class="item">
	                <span>电话：</span>
	                <div class="input-box">
	                    <input type="text" maxlength="11" class="mobile" id="custMobile" placeholder="请输入电话号码">
	                </div>
	            </div>
	            <div class="item" style="border:0 none;">
	                <span>验证码：</span>
	                <div class="input-box">
	                    <input type="text" class="code" id="vertifyCode" placeholder="请输入验证码">
	                    <span class="send-code-btn" id="sendCodeBtn">获取验证码</span>
	                </div>
	            </div>
	            <p class="tips-txt"></p>
	        </div>
	        <div class="btn-list">
	            <div><span id="sendBtn">提交信息</span></div>
	            <div><span id="closeBtn">取消</span></div>
	        </div>
	    </div>
	</div>
	<!--房产ID-->
	<input type="hidden" value="<?php echo $config["estate_Id"]?>" id="subEstateId"/>
	<!--房产名称-->
	<input type="hidden" value="<?php echo $config["estate_name"]?>" id="subEstateName"/> 

		<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
	
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wap.min.js"></script>

	<?php
	    if($router["page_type"] === "web"){
	?>
	    <script>
	          //_bd_share_config是提供给下面的share.js使用的
	          window._bd_share_config = {
	            "common": {
	                "bdSnsKey": {},
	                "bdText": "",
	                "bdMini": "2",
	                "bdMiniList": false,
	                "bdPic": "",
	                "bdStyle": "1",
	                "bdSize": "16"
	            },
	            "share": {},
	            "selectShare": {
	                "bdContainerClass": null,
	                "bdSelectMiniList": ["tsina", "tqq", "weixin", "qzone"]
	            }
	          };
	          //web页面中分享QQ、微信和微博
	          with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
	        </script>
	<?php        
	    }
	?>
        
	<!--微信分享，wap才有-->        
	<?php
	    if($router["page_type"] === "wap" && $config["wechat_share"]) {
	      require_once("../public/components/wap/wechatshare.php") ; 
	    }
	?>     
	

	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/jssrc/" . $router['page_type'] . ".js" ?>"></script>
	<?php 
	    }
	?>        
	<?php require_once("../public/components/GA_Baidu_statistic.php");?> 

	</body>
	</html>
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>