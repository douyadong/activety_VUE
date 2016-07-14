<!--web版底部预约信息输入-->
<div class="fixedBottom">
	<div class="content-wrapper">
		<span class="title">预约看房</span>
		<span class="label">姓名：</span> 
		<input type="text" class="name" id="custName" maxlength="8" placeholder="">
		<span class="label">电话：</span>
		<input type="text" class="tel" id="custMobile" maxlength="11" placeholder="">
		<span class="label">验证码：</span>
		<input type="text" class="code" id="vertifyCode">
		<span class="sendCodeBtn" id="sendCodeBtn">获取验证码</span>
		<span class="sendBtn" id="sendBtn">确定</span>
		<span class="phoneBtn"><?php echo $config["hotline"]?></span>
	</div>
</div>
<!--房产ID-->
<input type="hidden" value="<?php echo $config["estate_Id"]?>" id="subEstateId"/>
<!--房产名称-->
<input type="hidden" value="<?php echo $config["estate_name"]?>" id="subEstateName"/>  
<div class="w-alertBox">
	<div class="w-alertBG"></div>
	<div class="w-alertWin" style="background: url('../css/images/<?php echo $router["controller"] ; ?>/<?php echo $router["controller"] ; ?>_success.jpg') no-repeat scroll;"><span id="closeSuccess"></span></div>
</div>