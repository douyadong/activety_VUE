<!--微信分享-->
<?php
    if($config["wechat_share"]) {
?>
<input type="hidden" id="wechatTitle" value="<?php echo $config["wechat_title"]?>"/>
<input type="hidden" id="wechatContent" value="<?php echo $config["wechat_content"]?>"/>
<input type="hidden" id="wechatImgUrl" value="<?php echo $STATIC_DOMAIN ; ?>/activity/<?php echo $router["controller"] ; ?>/images/wechat_shared.jpg"/> 

<!--这里是微信分享的脚本-->        
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="<?php echo $STATIC_DOMAIN ; ?>/activity/public/js/wechat-share.min.js"></script>
<?php 
	} 
?> 