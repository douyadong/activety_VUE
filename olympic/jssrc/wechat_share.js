/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：奥运嘉年华
 2. 页面路径：olympic/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function WeChatShareController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    获取数据
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvents();
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 获取数据
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
WeChatShareController.prototype.bindEvents = function() {
    var classSelf = this;

    $('.btnJoin').on('click', function() {

        if (!/micromessenger/.test(navigator.userAgent.toLowerCase())) {
            window.location.href = 'http://wechat.wkzf.com/download.html?redirectUrl=wkzf://external_call/parameter?t=0$bt=22$url=http://t.cn/RtaWFou';
        } else {
            $(window).scrollTop(0);
            $('.overlay_img').show();
        }
    });

    $('.overlay_img').on('click',function(){
        $(this).hide();
    });
}




/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new WeChatShareController();
});
