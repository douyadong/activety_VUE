/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：活动生成页面脚本
 2. 页面名称：create.php
 3. 作者：tangxuyang@lifang.com
 4. 备注：对api的依赖：jQuery
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

$(function() {
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 添加额外脚本文件按钮的事件处理函数
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$('.addjs').click(function() {        
    var extra_javascript = $.trim($('#extra_javascript').val());//输入的文件名称
    if (extra_javascript) {
        var extra_javascripts = $('.javascripts li');

        //判断文件是否已在列表中存在，若存在直接返回，否则加入列表中
        if (extra_javascripts.filter(function(ind, ele) {
                return $.trim($(ele).text()) === extra_javascript;
            }).length > 0) {
            return;
        }

        /*
            <li class="list-group-item">
                extra_javascript.js
                <span class="glyphicon glyphicon-remove"></span>
                <input type="hidden" name="extra_javascripts[]" value="extra_javascript.js" />
            </li>
        */
        $('.javascripts ul').append($('<li>' + extra_javascript + '</li>')
                                    .addClass('list-group-item')
                                    .append(' <span class="glyphicon glyphicon-remove"></span>')
                                    .append('<input type="hidden" name="extra_javascripts[]" value="' + extra_javascript + '" />')
                                    );
        $('#extra_javascript').val('');//清空输入框
    }

});
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 添加额外样式表文件按钮的事件处理函数
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$('.addcss').click(function() {
    var extra_stylesheet = $.trim($('#extra_stylesheet').val());//输入的文件名称
    if (extra_stylesheet) {
        var extra_stylesheets = $('.stylesheets li');

        //判断文件是否已在列表中存在，若存在直接返回，否则加入列表中
        if (extra_stylesheets.filter(function(ind, ele) {
                return $.trim($(ele).text()) === extra_stylesheet;
            }).length > 0) {
            return;
        }

        /*
            <li class="list-group-item">
                extra_css.css
                <span class="glyphicon glyphicon-remove"></span>
                <input type="hidden" name="extra_stylesheets[]" value="extra_css.css" />
            </li>
        */
        $('.stylesheets ul').append($('<li>' + extra_stylesheet + '</li>')
                                    .addClass('list-group-item')
                                    .append(' <span class="glyphicon glyphicon-remove"></span>')
                                    .append('<input type="hidden" value="' + extra_stylesheet + '" name="extra_stylesheets[]"/>')
            );
        $('#extra_stylesheet').val('');
    }
});
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 额外样式表列表中删除按钮处理函数
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$('.stylesheets').delegate('.glyphicon-remove', 'click', function() {
    $(this).parent().remove();
});
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
额外脚本文件列表中删除按钮处理函数
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/    
$('.javascripts').delegate('.glyphicon-remove', 'click', function() {
    $(this).parent().remove();
});
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
微信分享checkbox的change事件处理函数.
取消勾选时禁用微信分享标题和内容的输入，反之打开
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/  
$(':input[name=wechat_share]').change(function() {
    if (this.checked) {
        $(this).closest('.form-group').nextAll().find('.form-control').attr('disabled', false);
    } else {
        $(this).closest('.form-group').nextAll().find('.form-control').attr('disabled', true);
    }
});
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
重置按钮处理函数
点击重置按钮，微信分享checkbox会取消勾选，
但是对应的微信分享标题和内容的输入框不会禁用，
所以添加了这个事件处理函数
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
$(':input[type=reset]').click(function() {
    $('[name=wechat_title],[name=wechat_content]').attr('disabled', true);
});

/*
    页面加载后，触发微信分享checkbox的change事件，
    让其可以影响微信分享标题和内容的输入框
*/
$(':input[name=wechat_share]').trigger('change');
});