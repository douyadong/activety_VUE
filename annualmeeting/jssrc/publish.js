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
    初始化页面
    -----------------------------------------------------------------------------------------------------------*/
    this.initPage();

    /*-----------------------------------------------------------------------------------------------------------
    初始化星空背景
    -----------------------------------------------------------------------------------------------------------*/
    this.initStar();

    /*-----------------------------------------------------------------------------------------------------------
    调用百度地图获取地位信息
    -----------------------------------------------------------------------------------------------------------*/
    this.getLocation();

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
PublishController.prototype.initPage = function () {

    this.openId = "";

    //微信选择本地图片返回的选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
    this.localIds = null;

    this.country = "中国"; // 定位的国家名，默认为中国

    this.city = "上海";//定位的城市名，默认为上海

    this.latitude = "38.65777"; //经度

    this.longitude = "104.08296"; //纬度
}


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
获取有发布过照片的用户显示最近一次发布的姓名和联系电话
-----------------------------------------------------------------------------------------------------------*/
PublishController.prototype.getDetails = function () {
    var classSelf = this;

    classSelf.request(classSelf.apiUrl.annualmeeting.getPhotoInfoByOpenId, {
        openId: classSelf.openId
    }, {
            process: function (resp) {
                if (resp && resp.length > 0) {
                    $('#txtUserName').val(resp[0].userName);
                    $('#txtMobile').val(resp[0].userPhone);
                }
            }
        })
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

            classSelf.latitude = lat;
            classSelf.longitude = lng;

            url = geoRequestUrl.replace('#positionInfo#', lat + ',' + lng);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'jsonp',
                success: function (resp) {
                    classSelf.country = resp.result.addressComponent.country;
                    classSelf.city = resp.result.addressComponent.city;

                    $('.location-info').find('.country').html(resp.result.addressComponent.country).css('visibility', 'visible');
                    $('.location-info').find('.city').html(resp.result.addressComponent.city.replace('市', '')).css('visibility', 'visible');
                },
                error: function () {
                    $('.location-info').find('.country').html('中国').css('visibility', 'visible');
                    $('.location-info').find('.city').html('上海').css('visibility', 'visible');
                }
            })
        }
        else {
            console.log('failed' + this.getStatus());
        }
    }, { enableHighAccuracy: true })
}

/*-----------------------------------------------------------------------------------------------------------
上传图片
-----------------------------------------------------------------------------------------------------------*/
PublishController.prototype.uploadImage = function () {
    var classSelf = this;
    var serverId;

    var txtMobile = $.trim($('#txtMobile').val());
    var txtUserName = $.trim($('#txtUserName').val());

    wx.uploadImage({
        localId: classSelf.localId, // 需要上传的图片的本地ID，由chooseImage接口获得
        isShowProgressTips: 1, // 默认为1，显示进度提示
        success: function (res) {
            serverId = res.serverId; // 返回图片的服务器端ID

            alert("serverId:" + serverId);
            console.log("serverId:" + serverId)

            classSelf.request(classSelf.apiUrl.annualmeeting.addPhoto, {
                openId: classSelf.openId,
                latitude: classSelf.latitude,
                longitude: classSelf.longitude,
                country: classSelf.country,
                city: classSelf.city,
                userName: txtUserName,
                userPhone: txtMobile,
                media_id: serverId
            }, {
                    process: function (resp) {
                        alert("上传成功！")
                    }
                })
        }
    });
}

/*-----------------------------------------------------------------------------------------------------------
绑定事件
-----------------------------------------------------------------------------------------------------------*/
PublishController.prototype.bindEvent = function () {
    var classSelf = this;

    //上传图片事件绑定
    $('.choose-box').on('click', function () {
        wx.chooseImage({
            count: 1,
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: function (res) {
                classSelf.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
            }
        });
    })

    //上传按钮事件绑定
    $('.button').on('click', function () {
        var txtMobile = $.trim($('#txtMobile').val());
        var txtUserName = $.trim($('#txtUserName').val());

        if (!classSelf.localId) {

        }

        classSelf.uploadImage();
    })

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
