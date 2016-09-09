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
    /*-----------------------------------------------------------------------------------------------------------
    初始化页面
    -----------------------------------------------------------------------------------------------------------*/
    this.initPage();
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
    /*-----------------------------------------------------------------------------------------------------------
    初始化手势左右滑动
    -----------------------------------------------------------------------------------------------------------*/
    this.initSwiper();
};

/*-----------------------------------------------------------------------------------------------------------
初始化页面
-----------------------------------------------------------------------------------------------------------*/
wapController.prototype.initPage = function() {
    var classSelf = this;
    classSelf.CakePos = [];
    //缓存每个月饼的位置信息
    $('.turntable .cake').each(function(index, el) {
        var cake = {
            key: index,
            bottom: $(el).css('bottom'),
            marginLeft: $(el).css('margin-left'),
            width: $(el).css('width')
        }
        classSelf.CakePos.push(cake);
    });

    var jump = function() {
        $('.turntable .item').animate({
            top: "45px",
        }, 1000).animate({
            top: "70px"
        }, 1000);
    }
    jump();
    si = setInterval(function() {
        jump();
    }, 2000);
}

wapController.prototype.createMask = function() {
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
初始化左右滑动
-----------------------------------------------------------------------------------------------------------*/
wapController.prototype.initSwiper = function() {
    var classSelf = this;

    var tableContainer = $('.turntable')[0];

    //Swipe
    Hammer(tableContainer).on("swipeleft", function() {
        //顺时针移动一次，所有月饼应该变换到的位置
        $.each(classSelf.CakePos, function(index, val) {
            /* iterate through array or object */
            classSelf.CakePos[index].key = classSelf.CakePos[index].key - 1 < 0 ? classSelf.CakePos.length - 1 : classSelf.CakePos[index].key - 1;
        });

        var itemCake = classSelf.CakePos[0];
        //给每个月饼添加动画
        $('.turntable .cake').each(function(index, el) {
            //获取当前月饼的下一个位置信息
            var pos = $.map(classSelf.CakePos, function(item, mapIndex) {
                if (item.key == index) {
                    return item;
                }
            })[0];
            if (index == itemCake.key) {
                $('.item .content img').attr({
                    src: $(el).data('font-src')
                });
                $('.item .content p').text($(el).data('desc'));
                $('.item').data('dialog', $(el).data('dialog'));
            }
            $(el).animate({
                bottom: pos.bottom
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            //左右移动动画
            $(el).animate({
                "margin-left": pos.marginLeft
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            //月饼大小动画
            $(el).animate({
                width: pos.width
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
        });

        //变换spot-list
        var activeSpot = $('.spot-list').find('.active');
        var nextSpot = activeSpot.next();
        activeSpot.removeClass('active')
        if (nextSpot.length > 0) {
            nextSpot.addClass('active');
        } else {
            $('.spot-list span:first-child').addClass('active');
        }
    });

    Hammer(tableContainer).on("swiperight", function() {
        //逆时针移动一次，所有月饼应该变换到的位置
        $.each(classSelf.CakePos, function(index, val) {
            /* iterate through array or object */
            classSelf.CakePos[index].key = classSelf.CakePos[index].key + 1 == classSelf.CakePos.length ? 0 : classSelf.CakePos[index].key + 1;
        });
        var itemCake = classSelf.CakePos[0];
        $('.turntable .cake').each(function(index, el) {
            //获取当前月饼的下一个位置信息
            var pos = $.map(classSelf.CakePos, function(item, mapIndex) {
                if (item.key == index) {
                    return item;
                }
            })[0];
            if (index == itemCake.key) {
                $('.item .content img').attr({
                    src: $(el).data('font-src')
                });
                $('.item .content p').text($(el).data('desc'));
                $('.item').data('dialog', $(el).data('dialog'))
            }
            //上下移动动画
            //queue:一个布尔值，指示是否将动画放置在效果队列中。如果为false时，将立即开始动画。
            //queue:一个布尔值，指示是否将动画放置在效果队列中。如果为false时，将立即开始动画。
            $(el).animate({
                left: pos.left
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            $(el).animate({
                bottom: pos.bottom
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            $(el).animate({
                "margin-right": pos.marginRight
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            //左右移动动画
            $(el).animate({
                "margin-left": pos.marginLeft
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
            //月饼大小动画
            $(el).animate({
                width: pos.width
            }, {
                queue: false,
                easing: 'linear',
                duration: 1000
            });
        });
        //变换spot-list
        var activeSpot = $('.spot-list').find('.active');
        var prevSpot = activeSpot.prev();
        activeSpot.removeClass('active')
        if (prevSpot.length > 0) {
            prevSpot.addClass('active');
        } else {
            $('.spot-list span:last-child').addClass('active');
        }
    });
}


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 绑定事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
wapController.prototype.bindEvent = function() {
    var classSelf = this;

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
    new wapController();
});
