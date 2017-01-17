/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：点亮地图年会活动
 2. 页面路径：annualmeeting/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function IndexController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
    -----------------------------------------------------------------------------------------------------------*/
    this.initStar();

    this.bindEvent();
};

/*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
-----------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initStar = function() {

    if ($('#star').length) $('#star').remove();
    $('body').append('<div id="star"></div>');
    $('#star').height($(document).height()).starfield({
        starDensity: 1.0,
        mouseScale: 1.0,
        seedMovement: false,
    }).height(0);
}


//创建阴影层
IndexController.prototype.createMask = function() {
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
        'z-index': '1000',
        'cursor': 'pointer'
    });
    $(document.body).append(mask);
};

IndexController.prototype.bindEvent = function() {
    var classSelf = this;
    $('.operation').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        // $('.new').append('<div class="image"><img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt=""></div>');
        // classSelf.initStar();
        classSelf.createMask();
        $('.dialog').fadeIn();
    });

    $('body').delegate('#mask-container', 'click', function(event) {
        $('.dialog').hide();
        $('#mask-container').remove();
    });
}



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new IndexController();
});
