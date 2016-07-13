<div class="w-dialog" id="yyForm"> 
	<div class="w-alertBox" style="background-image: url('../../css/images/<?php echo $router["controller"] ; ?>/<?php echo $router["controller"] ; ?>W_reserve.jpg') ;">
		<p class="text">看房预约</p>
		<div class="form">
			<div class="item">
				<span>姓名：</span>
				<div class="inputBox">
					<input type="text" maxlength="10" class="name" id="custName" placeholder="">
				</div>
			</div>
			<div class="item">
				<span>电话：</span>
				<div class="inputBox">
					<input type="text" maxlength="11" class="mobile" id="custMobile" placeholder="">
				</div>
			</div>
			<div class="item">
				<span></span>
				<div class="inputBox">
					<input type="text" class="code" id="vertifyCode">
					<span class="sendCodeBtn" id="sendCodeBtn">获取验证码</span>
				</div>
			</div>
			<p class="tipsTxt"></p>
		</div>
		<div class="btnList">
			<div><span id="sendBtn">确定预约</span></div>
			<div><span id="closeBtn">取消</span></div>
		</div>
	</div>
</div>