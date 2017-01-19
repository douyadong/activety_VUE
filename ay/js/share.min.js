/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：点亮地图年会活动
 2. 页面路径：annualmeeting/success.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function ShareController() {
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
    获取有发布过照片的用户显示最近一次发布的姓名和联系电话
    -----------------------------------------------------------------------------------------------------------*/
    this.getDetails();
    /*-----------------------------------------------------------------------------------------------------------
    绑定事件
    -----------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};


/*-----------------------------------------------------------------------------------------------------------
初始化页面
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.initPage = function() {
    var classSelf = this;

    classSelf.openId = classSelf.getQueryStringByName("openId");

    // classSelf.openId = "onco6txFeeYY_Y1UxYGbbl9Ch_tI";

    var link_moreUrl = $('.link_more').attr('href') + "?openId=" + classSelf.openId;

    $('.link_more').attr('href', link_moreUrl);
}

/*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.initStar = function() {
    if ($('#star').length) $('#star').remove();
    $('body').append('<div id="star"></div>');
    $('#star').height($(document).height()).starfield({
        starDensity: 1.0,
        mouseScale: 1.0,
        seedMovement: false,
    }).height(0);
}

/*-----------------------------------------------------------------------------------------------------------
initSwiper
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.initSwiper = function() {
    var classSelf = this;

    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        loop: true,
        pagination: '.swiper-pagination'
    })
}


/*-----------------------------------------------------------------------------------------------------------
获取有发布过照片相关信息
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.getDetails = function() {
    var classSelf = this;

    var $swiperContainer = $('.swiper-wrapper');
    var $swiperItem;

    classSelf.request(classSelf.apiUrl.annualmeeting.getPhotoInfoByOpenId, {
        openId: classSelf.openId
    }, {
        process: function(resp) {
            if (resp && resp.data && resp.data.length > 0) {
                $.each(resp.data, function(i, oData) {
                    $swiperItem = $('<div class="swiper-slide"></div>');
                    $swiperItem.append('<img src="' + oData.thumbnailUrl + '" alt="' + oData.userName + '">');
                    $swiperItem.find('img').attr('data-info', JSON.stringify(oData)).attr('data-id', oData.id);
                    $swiperContainer.append($swiperItem);
                })

                $('.img-box').show();
                classSelf.initSwiper();
                classSelf.initStar();
            }
        }
    })
}

/*-----------------------------------------------------------------------------------------------------------
创建照片弹出内容
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.createPhotoContent = function(el) {
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
        arr.push('<span>投票成功</span></p>');
    } else {
        arr.push('<img src="' + classSelf.staticDomain + '/ay/images/heart2.png" alt="heart">');
        arr.push('<span>点击为TA投票</span></p>');
    }
    arr.push('<p class="count">目前票数 ' + el.thumbs + '</p>');
    arr.push('</div>');
    $('.photo-dialog').empty().append(arr.join(''));
}

//创建阴影层
ShareController.prototype.createMask = function() {
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


/*-----------------------------------------------------------------------------------------------------------
绑定事件
-----------------------------------------------------------------------------------------------------------*/
ShareController.prototype.bindEvent = function() {
    var classSelf = this;

    //弹窗右上角叉叉的事件绑定
    $('.dialog').on('click', '.sprite-4', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('.dialog').hide();
        $('#mask-container').remove();
    });


    $('.swiper-wrapper').on('click', '.swiper-slide img', function(event) {
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

    $('.button').on('click', function() {
        window.location.href = classSelf.redirectUrl.annualmeeting.index;
    });

    //点赞和取消点赞的事件绑定
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
                    _.attr('data-isvote', 0);
                    photoInfo.isVote = 0;
                    photoInfo.thumbs = photoInfo.thumbs - 1;
                    _.find('img').attr('src', classSelf.staticDomain + '/ay/images/heart2.png');
                    _.find('p.count').text('目前票数 ' + photoInfo.thumbs);
                    _.find('.zan span').text("点击为TA投票");
                } else {
                    _.attr('data-isvote', 1);
                    photoInfo.isVote = 1;
                    photoInfo.thumbs = photoInfo.thumbs + 1;
                    _.find('img').attr('src', classSelf.staticDomain + '/ay/images/heart1.png');
                    _.find('p.count').text('目前票数 ' + photoInfo.thumbs);
                    _.find('.zan span').text("投票成功");
                }
                _.attr('data-info', JSON.stringify(photoInfo));
                $('.swiper-wrapper').find('img[data-id="' + id + '"]').attr('data-info', JSON.stringify(photoInfo));
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

    $('body').delegate('#mask-container', 'click', function(event) {
        $('.dialog').hide();
        $('#mask-container').remove();
    });
}



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new ShareController();
});
