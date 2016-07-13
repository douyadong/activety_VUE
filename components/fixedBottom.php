<!--web站点底部预约横条-->
<div class="fixedBottom">
	<div class="content-wrapper">
		<span class="title">预约看房</span>
		<span class="label">姓名：</span> 
		<input type="text" class="name" id="custName" maxlength="8" placeholder="">
		<span class="label">电话：</span>
		<input type="text" class="tel" id="custMobile" maxlength="11" placeholder="">
		<span class="sendCodeBtn" id="sendCodeBtn">获取验证码</span>
		<input type="text" class="code" id="vertifyCode">
		<span class="sendBtn" id="sendBtn">确定</span>
	</div>
</div>
<!--房产ID-->
<input type="hidden" value="<?php echo $confs["subEstateId"]?>" id="subEstateId"/>
<!--房产名称-->
<input type="hidden" value="<?php echo $confs["subEstateName"]?>" id="subEstateName"/>  