/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：奥运嘉年华
 2. 页面路径：olympic/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function DSXController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------
    设置ApiPrefix
    -----------------------------------------------------------------------------------------------------------*/
    this.setApiPrefix();
    /*-----------------------------------------------------------------------------------------------------------
    获取agentId
    -----------------------------------------------------------------------------------------------------------*/
    this.agentId = this.getQueryString("agentId");
    /*-----------------------------------------------------------------------------------------------------------
    事件绑定
    -----------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};


DSXController.prototype.setApiPrefix = function() {
    this.sxzApiPrefix = "//mk.dev.wkzf:8170/";
    if (this.environment === "dev") this.sxzApiPrefix = "//mk.dev.wkzf:8170/";
    else if (this.environment === "test") this.sxzApiPrefix = "//mk.test.wkzf:8170/";
    else if (this.environment === "sim") this.sxzApiPrefix = "//mk.sim.wkzf/";
    else if (this.environment === "prod") this.sxzApiPrefix = "//mk.wkzf.com/";
}

//创建阴影层
DSXController.prototype.createMask = function() {
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

//获取url search参数值方法
DSXController.prototype.getQueryString = function(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg); //获取url中"?"符后的字符串并正则匹配
    var context = "";
    if (r != null)
        context = r[2];
    reg = null;
    r = null;
    return context == null || context == "" || context == "undefined" ? "" : context;
};


DSXController.prototype.checkPhone = function(phone) {
    var regu = "(^1)[0-9]{10}$",
        re = new RegExp(regu);
    return re.test(phone);
};

/*-----------------------------------------------------------------------------------------------------------
事件绑定
-----------------------------------------------------------------------------------------------------------*/
DSXController.prototype.bindEvent = function() {
    var classSelf = this;
    var $error = $(".error");
    var $qrcode = $(".qrcode");
    $('.submit').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var phone = $('#phoneNum').val();
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
        } else {
            var data = {
                agentId: classSelf.agentId,
                phoneNum: phone,
                source: 1
            };

            $.ajax({
                url: classSelf.sxzApiPrefix + "sxzRecommend/enroll.action",
                method: "get",
                dataType: "json",
                data: data
            }).done(function(data) {
                if (data.status.toString() == "1") {
                    classSelf.createMask();
                    $qrcode.fadeIn('slow');
                    clearTimeout(t);
                    var t = setTimeout(function() {
                        $error.fadeOut('slow');
                    }, 2000);
                } else {
                    $error.fadeIn('slow', function() {
                        $error.text(data.message);
                    });
                    clearTimeout(t);
                    var t = setTimeout(function() {
                        $error.fadeOut('slow', function() {
                            $error.text("");
                        });
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
        $('.qrcode').hide();
        $('#mask-container').remove();
    });

    window.addEventListener('resize', function(e) {
        var $submit = $('.submit');
        $submit[0].scrollIntoView(false);
    });
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new DSXController();
});
