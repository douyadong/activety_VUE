/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房邀您一起挑月饼看楼盘啦
 2. 页面路径：nqzqplssy/wap.php （H5专题页）
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function zqController() {
    /*-----------------------------------------------------------------------------------------------------------
    初始化页面
    -----------------------------------------------------------------------------------------------------------*/
    this.initPage();
    /*-----------------------------------------------------------------------------------------------------------
    绑定事件
    -----------------------------------------------------------------------------------------------------------*/
    this.eventBind();
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
初始化页面
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
zqController.prototype.initPage = function() {
    var classSelf = this;
    classSelf.CakePos = [];
    //缓存每个月饼的位置信息
    $('.table-container .cake').each(function(index, el) {
        var cake = {
            key: index,
            top: $(el).css('top'),
            marginLeft: $(el).css('margin-left'),
            width: $(el).css('width')
        }
        classSelf.CakePos.push(cake);
    });
    var jump = function() {
        $('.table-container .item').animate({
            top: "-105px",
        }, 1000).animate({
            top: "-80px"
        }, 1000);
    }
    jump();
    si = setInterval(function() {
        jump();
    }, 2000);
};

zqController.prototype.createMask = function() {
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
        'z-index': '9999'
    });
    $(document.body).append(mask);
};

/*-----------------------------------------------------------------------------------------------------------
绑定事件
-----------------------------------------------------------------------------------------------------------*/
zqController.prototype.eventBind = function() {
    var classSelf = this;
    //箭头点击
    $('.arrow').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        if ($(this).hasClass('left-arrow')) {
            //顺时针移动一次，所有月饼应该变换到的位置
            $.each(classSelf.CakePos, function(index, val) {
                /* iterate through array or object */
                classSelf.CakePos[index].key = classSelf.CakePos[index].key - 1 < 0 ? classSelf.CakePos.length - 1 : classSelf.CakePos[index].key - 1;
            });

            var itemCake = classSelf.CakePos[0];
            //给每个月饼添加动画
            $('.table-container .cake').each(function(index, el) {
                //获取当前月饼的下一个位置信息
                var pos = $.map(classSelf.CakePos, function(item, mapIndex) {
                    if (item.key == index) {
                        return item;
                    }
                })[0];
                if (index == itemCake.key) {
                    $('.item .desc img').attr({
                        src: $(el).data('font-src')
                    });
                    $('.item .desc p').text($(el).data('desc'));
                    $('.item').data('dialog', $(el).data('dialog'));
                }
                //上下移动动画
                //queue:一个布尔值，指示是否将动画放置在效果队列中。如果为false时，将立即开始动画。
                $(el).animate({
                    top: pos.top
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
                //左右移动动画
                $(el).animate({
                    "margin-left": pos.marginLeft
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
                //月饼大小动画
                $(el).animate({
                    width: pos.width
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
            });
        }
        if ($(this).hasClass('right-arrow')) {
            //逆时针移动一次，所有月饼应该变换到的位置
            $.each(classSelf.CakePos, function(index, val) {
                /* iterate through array or object */
                classSelf.CakePos[index].key = classSelf.CakePos[index].key + 1 == classSelf.CakePos.length ? 0 : classSelf.CakePos[index].key + 1;
            });
            var itemCake = classSelf.CakePos[0];
            $('.table-container .cake').each(function(index, el) {
                //获取当前月饼的下一个位置信息
                var pos = $.map(classSelf.CakePos, function(item, mapIndex) {
                    if (item.key == index) {
                        return item;
                    }
                })[0];
                if (index == itemCake.key) {
                    $('.item .desc img').attr({
                        src: $(el).data('font-src')
                    });
                    $('.item .desc p').text($(el).data('desc'));
                    $('.item').data('dialog', $(el).data('dialog'))
                }
                //上下移动动画
                //queue:一个布尔值，指示是否将动画放置在效果队列中。如果为false时，将立即开始动画。
                $(el).animate({
                    top: pos.top
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
                //左右移动动画
                $(el).animate({
                    "margin-left": pos.marginLeft
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
                //月饼大小动画
                $(el).animate({
                    width: pos.width
                }, {
                    queue: false,
                    easing: 'linear',
                    duration: 500
                });
            });
        }
    });

    //item点击弹窗
    $('.item').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        classSelf.createMask();
        $('.dialog').hide();
        $("." + $(this).data("dialog")).show();
    });

    $('body').delegate('#mask-container,.close', 'click', function(event) {
        $('.dialog').hide();
        $('#mask-container').remove();
    });
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new zqController();
});
