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

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    标记字段
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.toastStatus = true; //是否允许显示log


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
初始化左右滑动
-----------------------------------------------------------------------------------------------------------*/
wapController.prototype.initSwiper = function() {
    var classSelf = this;

    var tableContainer = $('.turntable')[0];

    //Swipe
    Hammer(tableContainer).on("swipeleft", function() {
        alert('swipeleft');
    });

    Hammer(tableContainer).on("swiperight", function() {
        alert('swiperight');
    });
}


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 绑定事件
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
wapController.prototype.bindEvent = function() {

    var classSelf = this;

    var $btn = $('.btnSubmit');
    var $tdList = $('.country-list table tr:not(".medal") td');

    $('.country-list table tr:not(".medal")').find('td img').on('click', function() {
        var _this = $(this);
        $btn.attr('data-id', _this.attr('data-id'));

        $tdList.removeClass('active');

        _this.parent().addClass('active');
    });

    $('.btnSubmit').on('click', function() {
        var _this = $(this);
        var reg = new RegExp('^[1-9]\d*|0$');
        var txtGolden = $.trim($('#txtGolden').val());
        var txtSilver = $.trim($('#txtSilver').val());
        var txtCopper = $.trim($('#txtCopper').val());
        var country = _this.attr('data-id');
        var txtMobile = $.trim($('#custMobile').val());

        var requestData = {};


        if ($tdList.filter('.active').length == 0) {
            classSelf.showLog('请先选择一个国家！');
            return;
        }

        if (txtGolden.length == 0 || txtSilver.length == 0 || txtCopper.length == 0) {
            classSelf.showLog('金、银、铜都必须猜啦');
            return;
        }

        if (!reg.test(txtGolden) || !reg.test(txtSilver) || !reg.test(txtCopper)) {
            classSelf.showLog('竞猜数必须是整数！');
            return;
        }


        if (parseInt(txtGolden) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        if (parseInt(txtSilver) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        if (parseInt(txtCopper) > 999) {
            classSelf.showLog('竞猜数不能超过999！');
            return;
        }

        classSelf.displayDialog();
    });

    if (/Android/gi.test(navigator.userAgent)) {
        window.addEventListener('resize', function() {
            if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
                window.setTimeout(function() {
                    document.activeElement.scrollIntoViewIfNeeded();
                }, 0);
            }
        })
    }

};



/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new wapController();
});
