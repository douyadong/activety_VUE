/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房活动推广前端框架
 2. 页面名称：lufengyuan/web(智慧城wap端)
 3. 作者：yinqin@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(function() {
    //隐藏预约框
    $(".fixedBottom").css("display", "none");
    //当页面滚动到>banner3位置时，需要显示,<=banner3时,需要隐藏
    $(window).scroll(function() {
        var banner3Scroll = $("#banner3").offset().top, //第3张图片离顶部的高度
            scrollTop = $(window).scrollTop();
        if (scrollTop >= banner3Scroll) {
            $(".fixedBottom").css("display", "block");
        } else {
            $(".fixedBottom").css("display", "none");
        }
    });
});
