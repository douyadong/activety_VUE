/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：Merry christmas
 2. 页面名称：index.html
 3. 作者：yinqin@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function IndexController() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     init
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.init();
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     bindEvent
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.bindEvent();
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     initLoading
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.initLoading();
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 init
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.init = function() {
    var classSelf = this;
    $("[name='wechatUrl']").val(window.location.href);
    var bg = classSelf.getQueryStringByName("bg"),
        text = classSelf.getQueryStringByName("text"),
        name = classSelf.getQueryStringByName("name");
    if (bg && text && name) {
        $("#loading").hide();
        $("#content").show();
        $("#content").removeAttr("class").addClass(bg);
        $("#menu").hide();
        $("#content").attr("text", text);
        var htmlStr = '<img src="images/' + text + '.png">\
                            <div>\
                                ' + name + '\
                            </div>';
        $("#content").find(".text").html('').html(htmlStr).find("div").show();
        $("#makeup").show();
        $("[name='text']").val(classSelf.getQueryStringByName('text'));
        $("[name='username']").val(classSelf.getQueryStringByName("name"));
        $("[name='wechatTitle']").val('Merry Christmas 我愿为你种星辰');
        $("[name='wechatUrl']").val(window.location.href);
        classSelf.html2Canvans();
        $("#content").hide();
    } else {
        $("#loading").show();
        $("#content").hide();
    }
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 html2Canvans
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.html2Canvans = function() {
    var classSelf = this;
    html2canvas(document.body, {
        onrendered: function(canvas) {
            document.body.appendChild(canvas);
            var img = classSelf.convertCanvasToImage(document.getElementsByTagName("canvas")[0]);
            $(document.getElementsByTagName("canvas")[0]).hide();
            $("body").append(img).addClass("save-img");
        }
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 initChooseBg
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initChooseBg = function() {
    var mySwiper = new Swiper('#swiperBg', {
        direction: 'horizontal',
        loop: true,
        // 如果需要前进后退按钮
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        onSlideChangeEnd: function(swiper, event) {
            var index = swiper.activeIndex;
            if (swiper.activeIndex == 5) {
                index = 1;
            }
            $(".text").html('');
            $("#content").removeAttr("class").addClass("bg_" + index);
        }
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 initChooseText
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initChooseText = function() {
    var mySwiper2 = new Swiper('#swiperText', {
        direction: 'horizontal',
        loop: true,
        // 如果需要前进后退按钮
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        onSlideChangeEnd: function(swiper, event) {
            $("[name='username']").val('');
            console.log(swiper.activeIndex);
            var index = swiper.activeIndex;
            if (swiper.activeIndex == 5) {
                index = 1;
            }
            var htmlStr = '<img src="images/text_' + index + '.png">\
                            <div>\
                                <i></i>\
                                <input type="text" placeholder="输入姓名" id="name">\
                                <p>(输入10个字符以内的名字)</p>\
                            </div>';
            $("#content").removeAttr("text").attr("text", "text_" + index);
            $("#content").find(".text").html('').html(htmlStr);
        }
    })
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 bindEvent
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.bindEvent = function() {
    var classSelf = this;
    //选卡片点击事件
    $("#menu a[data-number=1]").click(function() {
        $("#chooseBg").show();
        $("#chooseText").hide();
        $("[name='bg']").val("bg_1");
        $("[name='text']").val("");
        classSelf.initChooseBg();
    });
    //音乐点击事件
    $("body").click(function() {
        if ($("#audio").attr("data-number") == "0") {
            document.getElementById('audio').play();
        }
        $("#audio").attr("data-number", "1");
    });
    //选祝福点击事件
    $("#menu a[data-number=2]").click(function() {
        $("#chooseText").show();
        $("#chooseBg").hide();
        classSelf.initChooseText();
    });

    //喜欢背景/祝福点击事件
    $(".lick-btn").click(function() {
        var dataNumber = $(this).attr("data-number");
        //1是背景  2是祝福
        if (dataNumber == "1") {
            $("[name = 'bg']").val($("#content").attr("class"));
            $("#chooseBg").hide();
        } else {
            $("[name = 'text']").val($("#content").attr("text"));
            $("#chooseText").hide();
            $(".text > div").fadeIn('slow');
        }
    });
    //点击开始制作
    $("#start").click(function() {
        $("#loading").hide();
        $("#content").fadeIn();
    });

    //阅读活动规则
    $("#showItems").click(function() {
        $("#items").fadeIn();
    })

    $("#items").click(function() {
        $("#items").fadeOut();
    });
    //已阅读规则确定
    $("#submitContrct").click(function() {
        if (!$("[name='contract']").is(':checked')) {
            classSelf.tips("请勾选并同意！");
            $("#contract").hide();
        } else {
            $("#contract").hide();
            $("#content .text>div").html('').html($("[name='username']").val());
            $("[name='wechatTitle']").val("Merry Christmas 我愿为你种星辰");
            $("[name='wechatContent']").val($("[name='username']").val() + "已经把对你的祝福种进悟空「圣诞星辰卡」，快打开看看吧~");
            $("[name='wechatUrl']").val(window.location.href + "?bg=" + $("[name='bg']").val() + "&text=" + $("[name='text']").val() + "&name=" + $("[name='username']").val());
            $("#menu").hide();
            classSelf.html2Canvans();
            $("#content").hide();
            $("#makeup").show();
            $("#guide").show();
        }
    });
    //输入姓名事件
    $("body").delegate('#name', 'change', function() {
        $("[name='username']").val($(this).val());
    });
    $("#guide").click(function() {
        $(this).hide();
    });
    $("#tipsSubmit").click(function() {
        $("#tips").fadeOut();
        if (!$("[name='contract']").is(':checked')) {
            $("#contract").show();
        }
    });
    //送出祝福
    window.addEventListener('resize', function(e) {
        var $name = $('#name');
        $name[0].scrollIntoView(false);
    });
    $("#submit").click(function() {
        //检查是否选了祝福语
        if (!$("[name='text']").val()) {
            classSelf.tips("请先选个祝福!");
            return false;
        }

        //检查姓名
        if (!$("[name='username']").val()) {
            classSelf.tips("请填写姓名!");
            return false;
        }
        //检查是否10个字
        var reg = /^[a-zA-Z\/ ]{1,10}$/;
        if (!reg.test($("#name").val())) {
            classSelf.tips("姓名最多10个英文字符!");
            return false;
        }

        $("#contract").fadeIn();
    })
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 initLoading
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initLoading = function() {
    //3s #processInner 执行完毕
    var timer = setInterval(function() {
        var currentWidth = $("#processInner").width();
        var loadingText = parseInt($("#loadfont").text().split("%")[0]);
        if (currentWidth >= 200) {
            clearInterval(timer);
            $("#man").fadeOut();
            $("#process").fadeOut();
            $("#loadfont").fadeOut();
            var timeout = setTimeout(function() {
                $("#start").css("bottom", "10px");
            }, 300);
        } else {
            $("#processInner").width(currentWidth + 2);
            $("#loadfont").text((loadingText + 1) + "%");
            $("#man img").css("margin-left", currentWidth + 2);
        }
    }, 8);
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 根据QueryString参数名称获取值
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.getQueryStringByName = function(name) {
    var result = location.search.match(new RegExp("[\?\&]" + name + "=([^\&]+)", "i"));
    if (result == null || result.length < 1) {
        return "";
    }
    return result[1];
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 tips
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.tips = function(text) {
    $("#tips").show();
    $("#tips p").text(text);
};

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 convertCanvasToImage
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.convertCanvasToImage = function(canvas) {
    var image = new Image();
    image.src = canvas.toDataURL("image/png");
    return image;
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
类的初始化
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function() {
    new IndexController;
});
