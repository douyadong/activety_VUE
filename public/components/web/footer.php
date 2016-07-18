<!--web footer-->
<!--web站点全局的预约框-->
<?php
    //底部预约条加载
    if($config["include_reserve"]) {
        require_once("reservefixed.php");
    }        
?>

<!--底部footer信息-->
<div class="public-footer">
    <div class="index-main-frame">
        <div class="logo-phone">
          <div class="logo"><a href="http://www.wkzf.com"><img src="http://static.wkzf.com/web_fe/img/source/public/bottom_logo.png" width="170" height="40"></a></div>
          <!-- <p class="phone">服务热线：400-821-5365</p> -->
        </div>
        <div class="bottom">
        <div class="index-main-frame">
            <span>©2015 悟空找房. All right reserved. 沪ICP备14043484号-1</span>
        </div>
    </div>
    </div>
</div>