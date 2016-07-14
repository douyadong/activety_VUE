<!--微信分享-->
<?php
    if($config["wechat_share"]) {
?>
<input type="hidden" id="wechatTitle" value="<?php echo $config["wechat_title"]?>"/>
<input type="hidden" id="wechatContent" value="<?php echo $config["wechat_content"]?>"/>
<input type="hidden" id="wechatImgUrl" value="<?php echo $STATIC_DOMAIN ; ?>/activity/<?php echo $router["controller"] ; ?>/images/wechat_shared.jpg"/> 
<?php 
	} 
?> 