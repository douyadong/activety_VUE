/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：点亮地图年会活动
 2. 页面路径：annualmeeting/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function PublishController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
    -----------------------------------------------------------------------------------------------------------*/
    this.initStar();

    /*-----------------------------------------------------------------------------------------------------------
    调用百度地图获取地位信息
    -----------------------------------------------------------------------------------------------------------*/
    this.getLocation();

    /*-----------------------------------------------------------------------------------------------------------
    绑定事件
    -----------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};

/*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
-----------------------------------------------------------------------------------------------------------*/
PublishController.prototype.initStar = function () {

    if ($('#star').length) $('#star').remove();
    $('body').append('<div id="star"></div>');
    $('#star').height($(document).height()).starfield({
        starDensity: 1.0,
        mouseScale: 1.0,
        seedMovement: false,
    }).height(0);
}

/*-----------------------------------------------------------------------------------------------------------
调用百度地图获取地位信息
-----------------------------------------------------------------------------------------------------------*/
PublishController.prototype.getLocation = function () {
    var classSelf = this;

    var lng, lat, url;

    var geoRequestUrl = "http://api.map.baidu.com/geocoder/v2/?ak=qNYWrlPhhs31jXqbHLMnKWrI&location=#positionInfo#&output=json&pois=1";

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function (r) {
        if (this.getStatus() == BMAP_STATUS_SUCCESS) {
            lng = r.point.lng;
            lat = r.point.lat;
            url = geoRequestUrl.replace('#positionInfo#', lat + ',' + lng);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'jsonp',
                success: function (resp) {
                    $('.location-info').find('.country').html(resp.result.addressComponent.country).css('visibility','visible');
                    $('.location-info').find('.city').html(resp.result.addressComponent.city.replace('市', '')).css('visibility','visible');
                },
                error: function () {
                    $('.location-info').find('.country').html('中国').css('visibility','visible');
                    $('.location-info').find('.city').html('上海').css('visibility','visible');
                }
            })
        }
        else {
            console.log('failed' + this.getStatus());
        }
    }, { enableHighAccuracy: true })
}


//创建阴影层
PublishController.prototype.createMask = function () {
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

PublishController.prototype.bindEvent = function () {
    var classSelf = this;
    $('.operation').on('click', function (event) {
        event.preventDefault();
        /* Act on the event */
        // $('.new').append('<div class="image"><img src="http://imgwater.oss.aliyuncs.com/45d675a655924322b45a045212035700.ML" alt=""></div>');
        // classSelf.initStar();
        classSelf.createMask();
        $('.dialog').fadeIn();
    });

    $('body').delegate('#mask-container', 'click', function (event) {
        $('.dialog').hide();
        $('#mask-container').remove();
    });
}



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function () {
    new PublishController();
});
