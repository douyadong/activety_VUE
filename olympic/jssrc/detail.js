/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：奥运嘉年华
 2. 页面路径：olympic/index.php
 3. 作者：yuxiaochen@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function DetailController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    获取数据
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.getData();
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 获取数据
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
DetailController.prototype.getData = function() {
    var classSelf = this;

    var cusPhone = classSelf.getUrlParam('cusPhone');

    classSelf.request(classSelf.apiUrl.olympics.query, { cusPhone: cusPhone }, {
        "process": function(data) {
            classSelf.render(data.data);
        }
    });
}


DetailController.prototype.render = function(data) {
    var classSelf = this;

    var imgSrc = classSelf.staticDomain + "/olympic/images/" + data.country + ".png";
    var countryName = "";

    if (data.country == "1") {
        countryName = "中国";
    } else if (data.country == "2") {
        countryName = "澳大利亚";
    } else if (data.country == "3") {
        countryName = "德国";
    } else if (data.country == "4") {
        countryName = "巴西";
    } else if (data.country == "5") {
        countryName = "美国";
    } else if (data.country == "6") {
        countryName = "英国";
    }

    $('.flag').append('<img src="' + imgSrc + '" alt="">');
    $('.flag').append('<span>' + countryName + '</span>')


    $('.count div:first').find('span').html(data.goldMedalCount);
    $('.count div:eq(1)').find('span').html(data.silverMedalCount);
    $('.count div:last').find('span').html(data.bronzeMedalCount);

}

DetailController.prototype.showLog = function(msg, callback) {
    var classSelf = this;
    if (classSelf.toastStatus) { //如果页面没有出错提示框，将toastStatus标记置为false，新建添加到body中并显示
        classSelf.toastStatus = false;
        var errElm = $('.wk-toast');
        if (!errElm[0]) {
            errElm = $('<div class="wk-toast"></div>').appendTo('body');
        }
        errElm.html(msg).addClass('show');
        setTimeout(function() { // 2400后自动消失，将toastStatus标记置为true,并且执行callback函数
            errElm.removeClass('show');
            classSelf.toastStatus = true;
            callback && callback();
        }, 2400);
    }
};

DetailController.prototype.getUrlParam = function(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg); //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new DetailController();
});
