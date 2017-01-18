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
    this.pageIndex = 0;
    this.pageSize = 10;
    /*-----------------------------------------------------------------------------------------------------------
    初始化页面
    -----------------------------------------------------------------------------------------------------------*/
    this.initPage();
    /*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
    -----------------------------------------------------------------------------------------------------------*/
    this.initStar();
    /*-----------------------------------------------------------------------------------------------------------
    下拉刷新
    -----------------------------------------------------------------------------------------------------------*/
    this.initPullload();
    /*-----------------------------------------------------------------------------------------------------------
    绑定事件
    -----------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
    // this.createMask();
};

/*-----------------------------------------------------------------------------------------------------------
初始化页面
-----------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initPage = function() {
    var classSelf = this;
    //最热
    classSelf.request("data.json?pageIndex=" + classSelf.pageIndex + "&pageSize=" + classSelf.pageSize, {}, {
        apiDataType: "json",
        process: function(data) {
            $.each(data.data, function(index, el) {
                var tmp = classSelf.createListItem(el);
                if (tmp && tmp.length) {
                    $(".hot").append(tmp);
                }
            });
        }
    });

    //最新
    classSelf.request("data.json?pageIndex=" + classSelf.pageIndex + "&pageSize=" + classSelf.pageSize, {
        pageIndex: classSelf.pageIndex,
        pageSize: classSelf.pageSize
    }, {
        apiDataType: "json",
        process: function(data) {
            $.each(data.data, function(index, el) {
                classSelf.pageIndex += 1;
                var tmp = classSelf.createListItem(el);
                if (tmp && tmp.length) {
                    $(".new").append(tmp);
                }
            });
        }
    })
}

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

/*-----------------------------------------------------------------------------------------------------------
下拉刷新
-----------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initPullload = function() {
    var classSelf = this;
    $(".new").pullload({
        apiUrl: "data.json?pageIndex=" + classSelf.pageIndex + "&pageSize=" + classSelf.pageSize,
        threshold: 50,
        callback: function(data) {
            $.each(data.data, function(index, el) {
                classSelf.pageIndex += 1;
                var tmp = classSelf.createListItem(el);
                if (tmp && tmp.length) {
                    $(".new").append(tmp);
                }
            });
        }
    });
};

/*-----------------------------------------------------------------------------------------------------------
创建元素
-----------------------------------------------------------------------------------------------------------*/
IndexController.prototype.createListItem = function(el) {
    var classSelf = this;
    var arr = [];
    if (!el) return arr;
    arr.push('<div class="image" data=' + JSON.stringify(el) + '>');
    arr.push('<img src="' + el.thumbnailUrl + '" alt="">');
    arr.push('<div class="location">');
    arr.push('<span class="content"><i class="sprite sprite-15"></i><span>' + el.country + '.' + el.city + '</span></span>');
    arr.push('<i class="triangel"></i>');
    arr.push('</div>');
    arr.push('<div class="zan">');
    arr.push('<div class="left">');
    arr.push('<img src="' + classSelf.staticDomain + '/annualmeeting/images/heart1.png" alt="heart">');
    arr.push('</div>');
    arr.push('<div class="right">');
    arr.push('<span class="count">147</span>');
    arr.push('<span class="name">测试测试</span>');
    arr.push('</div>');
    arr.push('</div>');
    arr.push('</div>');
    return arr.join('');
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
