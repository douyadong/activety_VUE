/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房邀您一起挑月饼看楼盘啦
 2. 页面路径：nqzqplssy/wap.php （H5专题页）
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function wapController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    标记字段
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.toastStatus = true; //是否允许显示log


    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 初始化弹出框相关事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
wapController.prototype.initDialog = function() {
    var classSelf = this;
    //获取验证码方法
    $("#sendCodeBtn").off('click').click(function() {
        if (classSelf.allowed) { //如果allowed为true,则发送请求
            var data = {
                phoneNum: $.trim($('#custMobile').val()),
                msgSourceType: 3
            };
            classSelf.request(classSelf.apiUrl.olympics.getPhoneVertifyCode, data, {
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

        var requestData = {
            cusName: $.trim($('#custName').val()),
            cusPhone: $.trim($('#custMobile').val()),
            vertifyCode: $.trim($('#vertifyCode').val()),
            country: country,
            goldMedalCount: txtGolden,
            silverMedalCount: txtSilver,
            bronzeMedalCount: txtCopper
        };

        classSelf.request(classSelf.apiUrl.olympics.add, requestData, {
            'type': 'GET',
            'process': function(data) {
                classSelf.showLog(data.message, function() {
                    window.location.href = classSelf.redirectUrl.olympics.detail + '?cusPhone=' + requestData.cusPhone;
                });
            },
            'onExceptionInterface': function(data) {
                if (data.message == "你已经猜过了哦") {
                    classSelf.showLog(data.message, function() {
                        window.location.href = classSelf.redirectUrl.olympics.detail + '?cusPhone=' + requestData.cusPhone;
                    });
                } else {
                    classSelf.showLog(data.message)
                }

            }
        });
    });
}



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 绑定事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
wapController.prototype.bindEvent = function() {

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

        if (txtGolden.length == 0 || txtSilver.length == 0 || txtCopper.length == 0) {
            classSelf.showLog('金、银、铜都必须猜啦');
            return;
        }

        if (!reg.test(txtGolden) || !reg.test(txtSilver) || !reg.test(txtCopper)) {
            classSelf.showLog('竞猜数必须是整数！');
            return;
        }


        if (parseInt(txtGolden) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        if (parseInt(txtSilver) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        if (parseInt(txtCopper) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        classSelf.displayDialog();
    });

    if (/Android/gi.test(navigator.userAgent)) {
        window.addEventListener('resize', function() {
            if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
                window.setTimeout(function() {
                    document.activeElement.scrollIntoViewIfNeeded();
                }, 0);
            }
        })
    }

};



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new wapController();
});
