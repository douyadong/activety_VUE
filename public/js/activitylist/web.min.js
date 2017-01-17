/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房活动推广前端框架
 2. 页面名称：web.html
 3. 作者：tangxuyang@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
 function WebController(){
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
继承于Controller基类
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
 	Controller.call(this);
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
bindEvent
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	this.bindEvent();
 }
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
bindEvent
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
WebController.prototype.bindEvent = function(){
	var classSelf = this;

	//预约按钮点击事件处理函数
	$('.btn_reserve').click(function(){
		var $this = $(this);
		var estateId = $this.data('id');
		var estateName = $this.data('name');

		$('.reserve-form').data('id',estateId);
		$('.reserve-form').data('name',estateName);
		$('.reserve-form').show();
	});

	//发送验证码按钮点击事件处理函数
	$('.sendCodeBtn').click(function(){
		if (classSelf.allowed) { //如果allowed为true,则发送请求
            var data = {
                phoneNum: $.trim($('.reserve-form [name=phoneNumber]').val()),
                msgSourceType: 3
            };
            classSelf.request(classSelf.apiUrl.wechat.getPhoneVertifyCode, data, {
                'type': 'GET',
                'process': function() {
                    //执行60s倒计时
                    classSelf.countDown();
                },
                'onExceptionInterface': function(data) {
                    classSelf.showLog(data.message);
                    classSelf.allowed = true;

                }
            });

            classSelf.allowed = false;
        }    
	});

	//取消按钮点击事件处理函数
	$('.cancelBtn').click(function(){
		$('.reserve-form').hide();
		$('.reserve-form [name=name]').val('');
		$('.reserve-form [name=phoneNumber]').val('');
        $('.reserve-form .tips-txt').text('');
        $('.reserve-form [name=verifyCode]').val('');

		$("html,body").css({
            'overflow': '',
            'height': 'auto'
        });        
	});

	//确认预约按钮点击事件处理函数
	$('.confirmReserveBtn').click(function(){
		var estateId = $.trim($('.reserve-form').data('id'));//房产ID
		var estateName = $.trim($('.reserve-form').data('name'));//房产名称
		var phoneNumber = $.trim($('.reserve-form [name=phoneNumber]').val());//预约人手机号
		var name = $.trim($('.reserve-form [name=name]').val());//预约人姓名
		var verifyCode = $.trim($('.reserve-form [name=verifyCode]').val());

		var data = {
            custName: name,
            custMobile: phoneNumber,
            subEstateName: estateName,
            subEstateId: estateId,
            vertifyCode: verifyCode,
            source: 1
        };
        classSelf.request(classSelf.apiUrl.wechat.saveData, data, {
            'type': 'GET',
            'process': function() {
                //成功则隐藏预约框，显示预约成功框
                $(".reserve-form").hide();
                $(".success-dialog").show();
            },
            'onExceptionInterface': function(data) {
                // 出错则在页面上显示出错信息，2000后自动消失
                classSelf.showLog(data.message);
            }
        });
	});

    $('.w-alert-win').click(function(){
        $('.reserve-form [name=phoneNumber]').val('');//预约人手机号
        $('.reserve-form [name=name]').val('');//预约人姓名
        $('.reserve-form [name=verifyCode]').val('');
        $("#sendCodeBtn").text("获取验证码");
        $("#sendCodeBtn").removeClass('disabled');
        classSelf.clearCountDown();
        location.reload();
    });
};

//错误显示
WebController.prototype.showLog = function(msg){
	$(".tips-txt").text(msg);
    setTimeout(function() {
        $(".tips-txt").text("");
        callback && callback();
    }, 2000);
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new WebController;
});