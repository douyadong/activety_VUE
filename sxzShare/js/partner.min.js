/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：奥运嘉年华
 2. 页面路径：olympic/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function PartnerController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------
    设置ApiPrefix
    -----------------------------------------------------------------------------------------------------------*/
    this.setApiPrefix();
    /*-----------------------------------------------------------------------------------------------------------
    设置页面默认值
    -----------------------------------------------------------------------------------------------------------*/
    this.setDefault();
    /*-----------------------------------------------------------------------------------------------------------
    获取agentId
    -----------------------------------------------------------------------------------------------------------*/
    this.agentId = this.getQueryString("agentId");
    /*-----------------------------------------------------------------------------------------------------------
    事件绑定
    -----------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};

PartnerController.prototype.setApiPrefix = function() {
    this.sxzApiPrefix = "//mk.dev.wkzf:8170/";
    if (this.environment === "dev") this.sxzApiPrefix = "//mk.dev.wkzf:8170/";
    else if (this.environment === "test") this.sxzApiPrefix = "//mk.test.wkzf:8170/";
    else if (this.environment === "sim") this.sxzApiPrefix = "//mk.sim.wkzf /";
    else if (this.environment === "prod") this.sxzApiPrefix = "//mk.wkzf.com/";
}

PartnerController.prototype.createMask = function() {
    //获取页面高度和宽度
    var sHeight = document.documentElement.scrollHeight,
        sWidth = document.documentElement.scrollWidth,
        mask = document.createElement('div');
    mask.id = 'mask-container';
    //遮罩层css
    $(mask).css({
        'background-color': 'rgba(0,0,0,0.7)',
        'position': 'fixed',
        'left': 0,
        'top': 0,
        'height': sHeight + 'px',
        'width': sWidth + 'px',
        'z-index': '9999',
        'cursor': 'pointer'
    });
    $(document.body).append(mask);
};

PartnerController.prototype.setDefault = function(name) {
    var classSelf = this;
    var $error = $(".error");
    var $br = $('.br');
    var $biz = $('.biz');
    var $bizOrd = $('.bizOrd');
    var $count = $('.count');
    $.ajax({
            url: classSelf.sxzApiPrefix + 'sxzRecommend/getShareSxzInfo.action',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            if (data.status.toString() == "1") {
                $br.text(data.data.buySellRatioStr);
                $biz.text(data.data.inviteBusinessRatioStr);
                $bizOrd.text(data.data.inviteBusinessBillRatioStr);
                $count.text(data.data.num);
            } else {
                $error.fadeIn('slow', function() {
                    $error.text(data.message);
                });
                clearTimeout(t);
                var t = setTimeout(function() {
                    $error.fadeOut('slow');
                }, 2000);
            }
        })
        .fail(function() {
            $error.fadeIn('slow', function() {
                $error.text("获取数据失败");
            });
            clearTimeout(t);
            var t = setTimeout(function() {
                $error.fadeOut('slow');
            }, 2000);
        })
}

//获取url search参数值方法
PartnerController.prototype.getQueryString = function(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg); //获取url中"?"符后的字符串并正则匹配
    var context = "";
    if (r != null)
        context = r[2];
    reg = null;
    r = null;
    return context == null || context == "" || context == "undefined" ? "" : context;
};

PartnerController.prototype.checkPhone = function(phone) {
    var regu = "(^1)[0-9]{10}$",
        re = new RegExp(regu);
    return re.test(phone);
};

PartnerController.prototype.checkName = function(name) {
    var error = false;
    if (!name || name.length >= 20) error = true;
    return error;
};

/*-----------------------------------------------------------------------------------------------------------
事件绑定
-----------------------------------------------------------------------------------------------------------*/
PartnerController.prototype.bindEvent = function() {
    var classSelf = this;
    var $error = $(".error");
    var $confirm = $(".confirm");
    $('.submit').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var phone = $.trim($('#phoneNum').val());
        var name = $.trim($('#name').val());
        if (!classSelf.checkPhone(phone)) {
            $error.fadeIn('slow', function() {
                $error.text("手机号输入有误");
            });
            clearTimeout(t);
            var t = setTimeout(function() {
                $error.fadeOut('slow', function() {
                    $error.text("");
                });
            }, 2000);
        } else if (classSelf.checkName(name)) {
            $error.fadeIn('slow', function() {
                $error.text("姓名输入有误");
            });
            clearTimeout(t);
            var t = setTimeout(function() {
                $error.fadeOut('slow', function() {
                    $error.text("");
                });
            }, 2000);
        } else {
            var data = {
                agentId: classSelf.agentId,
                phoneNum: phone,
                name: name,
                source: 2
            };

            $.ajax({
                url: classSelf.sxzApiPrefix + "sxzRecommend/enroll.action",
                method: "get",
                dataType: "json",
                data: data
            }).done(function(data) {
                if (data.status.toString() == "1") {
                    classSelf.createMask();
                    $confirm.fadeIn('slow');
                } else {
                    $error.fadeIn('slow', function() {
                        $error.text(data.message);
                    });
                    clearTimeout(t);
                    var t = setTimeout(function() {
                        $error.fadeOut('slow');
                    }, 2000);
                }
            }).fail(function() {
                $error.fadeIn('slow', function() {
                    $error.text("提交失败");
                });
                clearTimeout(t);
                var t = setTimeout(function() {
                    $error.fadeOut('slow', function() {
                        $error.text("");
                    });
                }, 2000);
            });
        }
    });

    $('body').delegate('#mask-container', 'click', function(event) {
        $('.confirm').hide();
        $('#mask-container').remove();
    });

    $(".ok").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('.confirm').hide();
        $('#mask-container').remove();
    });

    window.addEventListener('resize', function(e) {
        var $submit = $('.submit');
        $submit.scrollIntoView(false);
    });
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new PartnerController();
});
