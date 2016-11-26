<!--web版底部预约信息输入-->
<div class="fixed-bottom">
	<?php
		$hotline = empty($config['web_hotline'])?$config['hotline']:$config['web_hotline'];
		$hotline_subnum = empty($config['web_hotline_subnum'])?(empty($config['hotline_subnum'])?'':$config['hotline_subnum']):$config['web_hotline_subnum'];
	?>
	<div class="content-wrapper">
		<span class="title">预约看房</span>
		<span class="label">姓名：</span> 
		<input type="text" class="name" id="custName" maxlength="8" placeholder="">
		<span class="label">电话：</span>
		<input type="text" class="tel" id="custMobile" maxlength="11" placeholder="">
		<span class="label">验证码：</span>
		<input type="text" class="code" id="vertifyCode">
		<span class="send-code-btn" id="sendCodeBtn">获取验证码</span>
		<span class="send-btn" id="sendBtn">确定</span>
		<span class="phone-btn"><?php echo $hotline?><?php echo empty($hotline_subnum)?'':('转'.$hotline_subnum)?></span>
	</div>
</div>
<!--房产ID-->
<input type="hidden" value="<?php echo $config["estate_Id"]?>" id="subEstateId"/>
<!--房产名称-->
<input type="hidden" value="<?php echo $config["estate_name"]?>" id="subEstateName"/>  
<div class="w-alert-box">
	<div class="w-alert-bg"></div>
	<div class="w-alert-win" style="background: url('<?php echo "$CURRENT_STATIC_DOMAIN/public"?>/images/reserve_success.jpg') no-repeat scroll;"><span id="closeSuccess"></span></div>
</div>