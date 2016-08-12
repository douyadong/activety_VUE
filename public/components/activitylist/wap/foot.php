<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/config.js"></script>
<?php
    if(array_key_exists("extraJses",$config) && count($config["extraJses"]) > 0){
        foreach($config["extraJses"] as $js){
?>
<script src="<?php echo $js;?>"></srcipt>
<?php
		}
    }
?>
<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/app.min.js"></script>
<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/activitylist/wap.min.js"></script>
<?php
    if(array_key_exists("matchJs", $config) && $config["matchJs"] == "true"){
?>
<script src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"];?>/css/wap.min.js"/></script>
<?php
        }
?>


<!--微信分享-->
<?php
	if($config["wechatShare"] == "true"){
?>
<input type="hidden" id="wechatTitle" value="<?php echo $config["wechatTitle"]?>"/>
<input type="hidden" id="wechatContent" value="<?php echo $config["wechatTitle"]?>"/>
<input type="hidden" id="wechatImgUrl" value="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/<?php echo $router["activity_name"] ; ?>/images/wechat_shared.jpg"/> 

<!--这里是微信分享的脚本-->        
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/wechat-share.min.js"></script>
<?php
	}
?>

<?php require_once("../public/components/GA_Baidu_statistic.php");?>
</body>
</html>