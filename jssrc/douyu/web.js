/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：斗鱼直播－wap
 2. 页面名称：douyu/wap(斗鱼直播wap)
 3. 作者：luwei@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function WebController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     继承于Controller基类
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    Controller.call(this);
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
绑定事件
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
WebController.prototype.bindEvent = function() {
    var classSelf = this;
    $('.operation').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var type = $(this).data('type');
        var activityId = $('#activity_id').val();
        if (type === 'play') {
            var newWindow = window.open();
            var data = {
                id: activityId
            };
            classSelf.request(classSelf.apiUrl.douyu.getStatus, data, {
                'type': 'post',
                'apiDataType': 'jsonp',
                'showLoadingTips': false,
                process: function(data) {
                    var state = data.data.state.toString();
                    if (state === '1') {
                        newWindow.close();
                        classSelf.dialog("悟空直播将于6月30日下午两点开始，敬请期待哟～！");
                    } else if (state === '2') {
                        newWindow.location.href = "http://www.douyu.com/676965";
                    } else if (state === '3') {
                        newWindow.close();
                        classSelf.dialog("本期直播已结束，小悟空正在上传视频，敬请期待哦~");
                    }
                },
                onExceptionInterface: function(data) {
                    newWindow.close();
                    //显示出错信息
                    classSelf.showLog(data.message);
                }
            });
        } else if (type === 'desc') {
            $('.sec_desc').show();
            $('.sec_rule').hide();
            $('.sec_summary').hide();
        } else if (type === 'rule') {
            $('.sec_desc').hide();
            $('.sec_rule').show();
            $('.sec_summary').hide();
        } else if (type === 'summary') {
            $('.sec_desc').hide();
            $('.sec_rule').hide();
            $('.sec_summary').show();
        }
    });
};

/*-----------------------------------------------------------------------------------------------------------
弹窗
-----------------------------------------------------------------------------------------------------------*/
WebController.prototype.dialog = function(message) {
    //获取页面高度和宽度
    var sHeight = document.documentElement.scrollHeight;
    var sWidth = document.documentElement.scrollWidth;
    var mask = document.createElement('div');
    mask.id = 'mask-container';
    //遮罩层css
    $(mask).css({
        'background-color': 'rgba(0,0,0,0.3)',
        'position': 'absolute',
        'left': 0,
        'top': 0,
        'height': sHeight + 'px',
        'width': sWidth + 'px',
        'z-index': '200'
    });
    $(document.body).append(mask);

    //获取页面可视区域高度
    var dialog = document.createElement('div');
    var dialogHtml = [];
    dialog.id = 'dialog';
    dialogHtml.push('<div id="dialog-header">提示</div>');
    dialogHtml.push('<div id="dialog-content"><span>' + message + '</span></div>');
    dialogHtml.push('<div id="dialog-footer"><button id="d-cancel">我知道了</button></div>');
    $(dialog).append(dialogHtml.join(''));
    $(document.body).append(dialog);

    $('body').on('click', '#d-cancel,#mask-container', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('#mask-container').remove();
        $('#dialog').remove();
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new WebController;
});
