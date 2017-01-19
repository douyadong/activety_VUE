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
    初始化页面
    -----------------------------------------------------------------------------------------------------------*/
    this.initPage();
    /*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
    -----------------------------------------------------------------------------------------------------------*/
    this.initStar();
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
    classSelf.pageIndex = parseInt($('.new').attr('pageindex'));
    classSelf.pageSize = parseInt($('.new').attr('pagesize'));

    classSelf.openId = classSelf.getQueryStringByName("openId");
    // classSelf.openId = "oYaCYs-15kCMP529S81Yu0JsTLVg";

    //点亮城市
    classSelf.request(classSelf.apiUrl.annualmeeting.getCityCount, {}, {
        // apiDataType: "json",
        process: function(res) {
            $('.lighted').find('span.count').text(res.data);
        }
    });

    //热门
    classSelf.request(classSelf.apiUrl.annualmeeting.getHotPhotos + '?openId=' + classSelf.openId, {}, {
        // apiDataType: "json",
        process: function(res) {
            if (res.data.length) {
                $('.hot').append('<p class="title">热门照片</p>');
                $.each(res.data, function(index, el) {
                    var tmp = classSelf.createListItem(el);
                    if (tmp && tmp.length) {
                        $(".hot").append(tmp);
                    }
                });
                classSelf.initStar();
            }
        }
    });

    //最新
    classSelf.request(classSelf.apiUrl.annualmeeting.getNewPhotos + '?pageIndex=' + classSelf.pageIndex + '&pageSize=' + classSelf.pageSize + '&openId=' + classSelf.openId, {}, {
        // apiDataType: "json",
        process: function(res) {
            if (res.data.length) {
                $('.new').append('<p class="title">最新发布</p>');
                classSelf.pageIndex += 1;
                $('.new').attr("pageindex", classSelf.pageIndex);
                $.each(res.data, function(index, el) {
                    var tmp = classSelf.createListItem(el);
                    if (tmp && tmp.length) {
                        $(".new").append(tmp);
                    }
                });
                classSelf.initStar();
                classSelf.initPullload();
            }
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
        apiUrl: classSelf.apiUrl.annualmeeting.getNewPhotos + "?openId=" + classSelf.openId,
        crossDomain: "jsonp",
        threshold: 0,
        callback: function(data) {
            classSelf.pageIndex += 1;
            $('.new').attr("pageindex", classSelf.pageIndex);
            $.each(data.data, function(index, el) {
                var tmp = classSelf.createListItem(el);
                if (tmp && tmp.length) {
                    $(".new").append(tmp);
                }
            });
            classSelf.initStar();
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
    arr.push('<div class="image" data-id=' + el.id + ' data-info=' + JSON.stringify(el) + '>');
    arr.push('<img src="' + el.thumbnailUrl + '" alt="">');
    arr.push('<div class="location">');
    arr.push('<span class="content"><i class="sprite sprite-15"></i><span>' + el.country + '.' + el.city + '</span></span>');
    arr.push('<i class="triangel"></i>');
    arr.push('</div>');
    arr.push('<div class="zan">');
    arr.push('<div class="left">');
    arr.push('<img src="' + classSelf.staticDomain + '/ay/images/heart1.png" alt="heart">');
    arr.push('</div>');
    arr.push('<div class="right">');
    arr.push('<span class="count">' + el.thumbs + '</span>');
    arr.push('<span class="name">' + el.userName + '</span>');
    arr.push('</div>');
    arr.push('</div>');
    arr.push('</div>');
    return arr.join('');
}

/*-----------------------------------------------------------------------------------------------------------
创建照片弹出内容
-----------------------------------------------------------------------------------------------------------*/
IndexController.prototype.createPhotoContent = function(el) {
    var classSelf = this;
    var arr = [];
    if (!el) return arr;
    arr.push('<i class="close sprite sprite-4"></i>');
    arr.push('<div class="image">');
    arr.push('<img src="' + el.imgUrl + '" alt="">');
    arr.push('</div>');
    arr.push('<div class="location">');
    arr.push('<span class="content"><i class="sprite sprite-15"></i><span>' + el.country + '.' + el.city + '</span></span>')
    arr.push('<i class="triangel"></i>')
    arr.push('</div>');
    arr.push('<div class="vote" data-id=' + el.id + ' data-isvote=' + el.isVote + ' data-info=' + JSON.stringify(el) + '>');
    arr.push('<p class="name">' + el.userName + '</p>');
    arr.push('<p class="zan">');
    //0可以投票给，1不可以投票
    if (el.isVote) {
        arr.push('<img src="' + classSelf.staticDomain + '/ay/images/heart1.png" alt="heart">');
    } else {
        arr.push('<img src="' + classSelf.staticDomain + '/ay/images/heart2.png" alt="heart">');
    }
    arr.push('点击为TA投票</p>');
    arr.push('<p class="count">目前票数 ' + el.thumbs + '</p>');
    arr.push('</div>');
    $('.photo-dialog').empty().append(arr.join(''));
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

    $('.rule').on('click', '.image', function(event) {
        event.preventDefault();
        /* Act on the event */
        classSelf.createMask();
        $('.award-dialog').fadeIn();
    });

    $('.dialog').on('click', '.sprite-4', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('.dialog').hide();
        $('#mask-container').remove();
    });

    $('.operation').on('click', '.add', function(event) {
        event.preventDefault();
        /* Act on the event */
        window.location.href = 'publish.html?openId=' + classSelf.openId;
    });

    $('.operation').on('click', '.my', function(event) {
        event.preventDefault();
        /* Act on the event */
        classSelf.request(classSelf.apiUrl.annualmeeting.getPhotoInfoByOpenId, {
            openId: classSelf.openId
        }, {
            process: function(resp) {
                if (resp && resp.data && resp.data.length > 0) {
                    window.location.href = 'success.html?openId=' + classSelf.openId;
                } else {
                    classSelf.tips("您还没有上传照片");
                }
            }
        })
    });

    $('body').delegate('#mask-container', 'click', function(event) {
        $('.dialog').hide();
        $('#mask-container').remove();
    });

    $('.hot,.new').on('click', '.image', function(event) {
        event.preventDefault();
        /* Act on the event */
        var photoInfo = $(this).attr('data-info');
        $('.dialog').hide();
        if (photoInfo.length > 0) {
            classSelf.createPhotoContent($.parseJSON(photoInfo));
            classSelf.createMask();
            $('.photo-dialog').fadeIn();
        }
    });

    $('.photo-dialog').on('click', '.vote', function(event) {
        event.preventDefault();
        /* Act on the event */
        var _ = $(this);
        var isVote = parseInt(_.attr('data-isvote'));
        var photoInfo = $.parseJSON(_.attr('data-info'));
        var id = parseInt(_.attr('data-id'));
        var requestUrl = '';
        var data = {
            openId: classSelf.openId,
            photoId: id
        };
        var params = {
            process: function(res) {
                if (isVote) {
                    //取消点赞
                    _.attr('data-isvote', 0);
                    photoInfo.isVote = 0;
                    photoInfo.thumbs = parseInt(photoInfo.thumbs) - 1;
                    _.find('img').attr('src', classSelf.staticDomain + '/ay/images/heart2.png');
                    _.find('p.count').text('目前票数 ' + photoInfo.thumbs);
                } else {
                    //点赞
                    _.attr('data-isvote', 1);
                    photoInfo.isVote = 1;
                    photoInfo.thumbs = parseInt(photoInfo.thumbs) + 1;
                    _.find('img').attr('src', classSelf.staticDomain + '/ay/images/heart1.png');
                    _.find('p.count').text('目前票数 ' + photoInfo.thumbs);
                }
                _.attr('data-info', JSON.stringify(photoInfo));
                $('.hot,.new').find('.image[data-id="' + id + '"]').attr('data-info', JSON.stringify(photoInfo));
                $('.hot,.new').find('.image[data-id="' + id + '"]').find('.count').text(photoInfo.thumbs);
            },
            onExceptionInterface: function(res) {
                classSelf.tips(res.message);
            }
        };
        //0可以点赞，1取消点赞
        if (isVote) {
            requestUrl = classSelf.apiUrl.annualmeeting.delThumbs;
        } else {
            requestUrl = classSelf.apiUrl.annualmeeting.addThumbs;
        }
        classSelf.request(requestUrl, data, params)
    });
};


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new IndexController();
});
