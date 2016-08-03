/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：奥运嘉年华
 2. 页面路径：olympic/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function IndexController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    标记字段
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.toastStatus = true; //是否允许显示log

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    初始化弹出框相关事件
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.initDialog();

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 初始化弹出框相关事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initDialog = function() {
    var classSelf = this;
    //获取验证码方法
    $("#sendCodeBtn").off('click').click(function() {
        if (classSelf.allowed) { //如果allowed为true,则发送请求
            var data = {
                phoneNum: $.trim($('#custMobile').val()),
                msgSourceType: 3
            };
            classSelf.request(classSelf.apiUrl.wechat.getPhoneVertifyCode, data, {
                'type': 'GET',
                'process': function() {
                    //执行60s倒计时
                    classSelf.countDown();
                },
                'onExceptionInterface': function(data) {
                    //显示出错信息，2000后自动消失
                    $(".tips-txt").text(data.message);
                    setTimeout(function() {
                        $(".tips-txt").text("");
                    }, 2000);
                }
            });
        }
    });

    //保存数据方法
    $("#sendBtn").off('click').click(function() {
        var txtGolden = $.trim($('#txtGolden').val());
        var txtSilver = $.trim($('#txtSilver').val());
        var txtCopper = $.trim($('#txtCopper').val());
        var country = $('.country-list table').find('td.active img').attr('data-id');

        var data = {
            cusName: $.trim($('#custName').val()),
            cusPhone: $.trim($('#custMobile').val()),
            vertifyCode: $.trim($('#vertifyCode').val()),
            country: country,
            goldMedalCount: txtGolden,
            silverMedalCount: txtSilver,
            bronzeMedalCount: txtCopper
        };

        classSelf.request(classSelf.apiUrl.olympics.add, data, {
            'type': 'GET',
            'process': function() {
                window.location.href = classSelf.redirectUrl.olympics.detail + '?cusPhone=' + data.cusPhone;
            },
            'onExceptionInterface': function(data) {
                classSelf.showLog(data.message)
            }
        });
    });
}


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 设置dialog 显示与隐藏
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.displayDialog = function(isShow) {

    if (!isShow) {
        $("#yyForm").show(); //显示预约弹出框
        $("html,body").css({
            'overflow': 'hidden',
            'height': '100%'
        });
    } else {
        $("#yyForm").hide(); //隐藏预约弹出框
        $("html,body").css({
            'overflow': '',
            'height': 'auto'
        });
    }

}


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 绑定事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.bindEvent = function() {

    var classSelf = this;

    var $btn = $('.btnSubmit');
    var $tdList = $('.country-list table tr:not(".medal") td');

    $('.country-list table tr:not(".medal")').find('td img').on('click', function() {
        var _this = $(this);
        $btn.attr('data-id', _this.attr('data-id'));

        $tdList.removeClass('active');

        _this.parent().addClass('active');
    });

    $('.btnSubmit').on('click', function() {
        var _this = $(this);
        var reg = new RegExp('^[1-9]\d*|0$');
        var txtGolden = $.trim($('#txtGolden').val());
        var txtSilver = $.trim($('#txtSilver').val());
        var txtCopper = $.trim($('#txtCopper').val());
        var country = _this.attr('data-id');
        var txtMobile = $.trim($('#custMobile').val());

        var requestData = {};


        if ($tdList.filter('.active').length == 0) {
            classSelf.showLog('请先选择一个国家！');
            return;
        }

        if (txtCopper.length == 0 || txtSilver.length == 0 || txtCopper.length == 0) {
            classSelf.showLog('金、银、铜都必须猜啦');
            return;
        }

        if (!reg.test(txtGolden) || !reg.test(txtSilver) || !reg.test(txtCopper)) {
            classSelf.showLog('竞猜数必须是整数！');
            return;
        }


        if (parseInt(txtGolden) > 999) {
            classSelf.showLog('竞猜数必须是整数！');
        }

        if (parseInt(txtSilver) > 999) {
            classSelf.showLog('竞猜数必须是整数！');
        }

        if (parseInt(txtCopper) > 999) {
            classSelf.showLog('竞猜数必须是整数！');
        }

        classSelf.displayDialog();
    });
};


IndexController.prototype.showLog = function(msg, callback) {
    var classSelf = this;
    if (classSelf.toastStatus) { //如果页面没有出错提示框，将toastStatus标记置为false，新建添加到body中并显示
        classSelf.toastStatus = false;
        var errElm = $('.wk-toast');
        if (!errElm[0]) {
            errElm = $('<div class="wk-toast"></div>').appendTo('body');
        }
        errElm.html(msg).addClass('show');


        setTimeout(function() { // 2400后自动消失，将toastStatus标记置为true,并且执行callback函数
            errElm.remove();
            classSelf.toastStatus = true;
            callback && callback();
        }, 2000);
    }
};


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new IndexController();
});
