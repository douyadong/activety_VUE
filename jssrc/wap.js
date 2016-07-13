/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房活动推广前端框架
 2. 页面名称：smartCity/wap(智慧城wap端)
 3. 作者：yinqin@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function WapController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 绑定事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
WapController.prototype.bindEvent = function() {
    var classSelf = this;
    //获取验证码方法
    $("#sendCodeBtn").click(function() {
        if (classSelf.allowed) { //如果allowed为true,则发送请求
            var data = {
                phoneNum: $('#custMobile').val().trim(),
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
                    $(".tipsTxt").text(data.message)
                    setTimeout(function() {
                        $(".tipsTxt").text("")
                    }, 2000);
                }
            });
        }
    });

    //保存数据方法
    //@source：1表示web端  2表示wap端
    $("#sendBtn").click(function() {
        var data = {
            custName: $('#custName').val().trim(),
            custMobile: $('#custMobile').val().trim(),
            subEstateName: $('#subEstateName').val().trim(),
            subEstateId:$('#subEstateId').val().trim(),
            vertifyCode: $('#vertifyCode').val().trim(),
            source: 2
        };
        classSelf.request(classSelf.apiUrl.wechat.saveData, data, {
            'type': 'GET',
            'process': function() {
                //成功则隐藏预约框，显示预约成功框
                $("#yyForm").hide();
                $("#Success").show();
            },
            'onExceptionInterface': function(data) {
                // 出错则在页面上显示出错信息，2000后自动消失
                $(".tipsTxt").text(data.message);
                setTimeout(function() {
                    $(".tipsTxt").text("");
                }, 2000);
            }
        });
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new WapController;
});
