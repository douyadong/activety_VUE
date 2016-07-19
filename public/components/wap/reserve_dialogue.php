<!--wap端预约的弹窗-->
<div class="w-dialog" id="Success">
    <div class="w-alert-box success-box">
        <p class="text">看房预约</p>
        <p class="fz14">您的预约已成功，我们的新房顾问将马上与您联系!</p>
        <span id="closeSuccess" class="close-success">确   定</span>
    </div>
</div>
<div class="w-dialog" id="yyForm"> 
    <div class="w-alert-box">
        <p class="text">看房预约</p>
        <div class="form">
            <div class="item">
                <span>姓名：</span>
                <div class="input-box">
                    <input type="text" maxlength="10" class="name" id="custName" placeholder="请输入姓名">
                </div>
            </div>
            <div class="item">
                <span>电话：</span>
                <div class="input-box">
                    <input type="text" maxlength="11" class="mobile" id="custMobile" placeholder="请输入电话号码">
                </div>
            </div>
            <div class="item" style="border:0 none;">
                <span>验证码：</span>
                <div class="input-box">
                    <input type="text" class="code" id="vertifyCode" placeholder="请输入验证码">
                    <span class="send-code-btn" id="sendCodeBtn">获取验证码</span>
                </div>
            </div>
            <p class="tips-txt"></p>
        </div>
        <div class="btn-list">
            <div><span id="sendBtn">确定预约</span></div>
            <div><span id="closeBtn">取消</span></div>
        </div>
    </div>
</div>
<!--房产ID-->
<input type="hidden" value="<?php echo $config["estate_Id"]?>" id="subEstateId"/>
<!--房产名称-->
<input type="hidden" value="<?php echo $config["estate_name"]?>" id="subEstateName"/>  