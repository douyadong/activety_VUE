<!--微信分享-->
<?php
    if($confs["match_wechatShare"]) {
?>
<input type="hidden" id="wechatTitle" value="<?php echo $confs["wechatTitle"]?>"/>
<input type="hidden" id="wechatContent" value="<?php echo $confs["wechatContent"]?>"/>
<input type="hidden" id="wechatImgUrl" value="<?php echo $STATIC_DOMAIN ; ?>/activity_template/css/images/<?php echo $router["controller"] ; ?>/wechat_shared.jpg"/> <?php } ?> 
