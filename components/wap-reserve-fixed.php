<!--wap端底部预按钮-->
<?php
    if($config["include_reserve"]) {//根据配置决定是否包含预约按钮
?>
    <div class="butbox">
        <a href="javascript:;" class="appointmentbtn" id="yyBtn">预约看房</a>
        <a href="tel:<?php echo $config["hotline"]?>">咨询热线</a>
    </div>
<?php } ?> 