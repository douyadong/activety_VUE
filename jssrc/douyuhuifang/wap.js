/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：斗鱼直播－web
 2. 页面名称：douyu/web(斗鱼直播web)
 3. 作者：luwei@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function WebController() {
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
WebController.prototype.bindEvent = function() {
    var classSelf = this;
    $('.play_btn').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
         window.location.href = 'http://v.youku.com/v_show/id_XMTYyNzYyMTg5Ng==.html?from=s1.8-1-1.2';
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new WebController;
});
