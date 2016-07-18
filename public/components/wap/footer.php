<!--.content .footer-->    
<!--wap端预约的弹窗-->
<?php
    if($config['include_reserve']){
    	require_once("reserve_dialogue.php") ;
    }
?>
<!--微信分享，因为wechat-share.js用来jquery，所以把微信分享放到了foot里面 -->