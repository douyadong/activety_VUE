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
$('#wechatShare').change(function() {
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
    $('#wechatTitle,#wechatContent').attr('disabled', true);
    $('tbody').empty();
});

/*
    页面加载后，触发微信分享checkbox的change事件，
    让其可以影响微信分享标题和内容的输入框
*/
$('#wechatShare').trigger('change');
});

/*

*/
$('#sections').delegate('.add-btn','click',function(){
    var $section = $(this).closest('div.section');

    var estateId = $('.estate-Id',$section).val();
    var estateName = $('.estate-name',$section).val();
    var webLink = $('.web-link',$section).val();
    var wapLink = $('.wap-link',$section).val();
    var price = $('.price',$section).val();
    var webImg = $('.web-img',$section).val();
    var wapImg = $('.wap-img',$section).val();
    var hotline = $('.hotline',$section).val();
    var hotlineSubNum = $('.hotline-subnum',$section).val();

    var $tr = $('<tr></tr>');
    $tr.append("<td>"+estateId+"</td>");
    $tr.append("<td>"+estateName+"</td>");
    $tr.append("<td>"+webLink+"</td>");
    $tr.append("<td>"+wapLink+"</td>");
    $tr.append("<td>"+price+"</td>");
    $tr.append("<td>"+webImg+"</td>");
    $tr.append("<td>"+wapImg+"</td>");
    $tr.append("<td>"+"<span class='ht'>" +hotline+"</span>-<span class='htsub'>"+hotlineSubNum+"</span></td>");
    $tr.append("<td><a href='javascript:;' class='delete'>删除</a></td>");

    $('tbody',$section).append($tr);  
    $('input',$section).val('');
});

$('#sections').delegate('.delete','click',function(){
    $(this).closest('tr').remove();
});


$('#createBtn').click(function(){
    var activityName = $('#activityName').val();
    var pageTitle = $('#pageTitle').val();
    var pageDescription = $('#pageDescription').val();
    var pagekeywords = $('#pageKeywords').val();
    var wechatShare = $('#wechatShare').prop('checked');
    var wechatTitle = $('#wechatTitle').val();
    var wechatContent = $('#wechatContent').val();
    var extraCsses = [];
    var extraJses = [];
    var sections = [];
    var includeReserve = $('#includeReserve').prop('checked');
    var matchCss = $('#matchCss').prop('checked');
    var matchJs = $('#matchJs').prop('checked');

    //收集额外样式文件
    $('.stylesheets li').each(function(){
        extraCsses.push($(this).text());
    });

    //收集额外脚本文件
    $('.javascripts li').each(function(){
        extraJses.push($(this).text());
    });

    //收集section数据
    $('#sections .section').each(function(){
        var $section = $(this);
        var sectionName = $('.section-name',$section).text();
        var sectionWebLink = $('.section-web-link',$section).text();
        var sectionWapLink = $('.section-wap-link',$section).text();
        var estates = [];
        $('tbody tr',$section).each(function(){
            var $tr = $(this);
            estates.push({
                estateId:$tr.find('td:eq(0)').text(),
                estateName:$tr.find('td:eq(1)').text(),
                webLink:$tr.find('td:eq(2)').text(),
                wapLink:$tr.find('td:eq(3)').text(),
                price:$tr.find('td:eq(4)').text(),
                webImg:$tr.find('td:eq(5)').text(),
                wapImg:$tr.find('td:eq(6)').text(),
                hotline:$tr.find('td:eq(7) .ht').text(),
                hotlineSubNum:$tr.find('td:eq(7) .htsub').text()
            });
        });

        sections.push({
            name:sectionName,
            webLink:sectionWebLink,
            wapLink:sectionWapLink,
            estates:estates
        });
    });

    var data = {
            activityName: activityName,
            pageTitle: pageTitle,
            pageDescription: pageDescription,
            pagekeywords: pagekeywords,
            wechatShare: wechatShare,
            wechatTitle: wechatTitle,
            wechatContent: wechatContent,
            extraCsses: extraCsses,
            extraJses: extraJses,
            matchJs: matchJs,
            matchCss: matchCss,
            includeReserve: includeReserve,
            sections: sections
        };
    //发送请求
    $.ajax({
        url:'createAction.php',
        type:'post',
        dataType:'json',
        data:data,
        success:function(data){
            data = eval('('+data+')');
            if(data.status == 1){
                alert("成功");
                location.reload();
            }
        },
        error:function(){


        }
    });
});

$('#addSectionBtn').click(function(){
    var sectionName = $('#sectionName').val();
    var sectionWebLink = $('#sectionWebLink').val();
    var sectionWapLink = $('#sectionWapLink').val();
    var $section = $('#sectionTemplate').clone().removeClass('hide');
    $('.section-name',$section).text(sectionName);
    $('.section-web-link',$section).text(sectionWebLink);
    $('.section-wap-link',$section).text(sectionWapLink);
    $('#sections').append($section);

    $('#sectionName').val('');
    $('#sectionWebLink').val('');
    $('#sectionWapLink').val('');
});

$('#sections').delegate('.delete-section','click',function(){
    $(this).closest('.section').remove();
});

$('#sections').delegate('.collapse-section','click',function(){
    var $section = $(this).closest('.section');
    if($section.data('collapse')){
        $section.find('>*:not(h4)').show();
        $section.data('collapse',false);
        $section.find('.close').text('-');
    }else{
        $section.find('>*:not(h4)').hide();
        $section.data('collapse',true);
        $section.find('.close').text('+');
    }
});