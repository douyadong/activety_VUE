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

    this.mySwiper2 = null;
    this.mySwiper = null;
};

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
        'z-index': '999',
        'cursor': 'pointer'
    });
    $(document.body).append(mask);
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
                                ' + decodeURI(name) + '\
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
        },
        width: 640
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 initChooseBg
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initChooseBg = function() {
    var classSelf = this;
    classSelf.mySwiper = new Swiper('#swiperBg', {
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
            if (swiper.activeIndex == 0) {
                index = 4;
            }
            $("#content").removeAttr("class").addClass("bg_" + index);
        }
    });
};
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 initChooseText
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
IndexController.prototype.initChooseText = function() {
    var classSelf = this;
    classSelf.mySwiper2 = new Swiper('#swiperText', {
        direction: 'horizontal',
        loop: true,
        // 如果需要前进后退按钮
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        onSlideChangeEnd: function(swiper, event) {
            $("[name='username']").val('');
            var index = swiper.activeIndex;
            if (swiper.activeIndex == 5) {
                index = 1;
            }
            if (swiper.activeIndex == 0) {
                index = 4;
            }
            var htmlStr = '<img src="images/text_' + index + '.png">\
                            <div>\
                                <div class="animate"><i></i>\
                                <input type="text" placeholder="输入姓名" id="name"></div>\
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
        $(this).find(".tip").hide();
        $("#mask-container").remove();
        if (!classSelf.mySwiper) {
            classSelf.initChooseBg();
        }
    });
    $(".music").click(function() {
        var $this = $(this);
        if ($("#audio").attr("data-number") == "0") {
            if ($this.attr("data-number") == "0") {
                document.getElementById('audio').pause();
                $("#audio").attr("data-number", "1");
                $this.attr("data-number", "1");
            } else {
                document.getElementById('audio').play();
                $("#audio").attr("data-number", "1");
                $this.attr("data-number", "0");
            }
        } else {
            if ($this.attr("data-number") == "0") {
                document.getElementById('audio').pause();
                $("#audio").attr("data-number", "0");
                $this.attr("data-number", "1");
            } else {
                document.getElementById('audio').play();
                $this.attr("data-number", "0");
                $("#audio").attr("data-number", "1");
            }
        }
    });
    //音乐点击事件
    document.getElementsByTagName("body")[0].ontouchstart = function() {
        var u = navigator.userAgent;
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        if (isiOS) {
            if ($("body").attr("data-number") == "0") {
                document.getElementById('audio').play();
            }
            $("body").attr("data-number", "1");
        }
    };
    //选祝福点击事件
    $("#menu a[data-number=2]").click(function() {
        $("#chooseText").show();
        $("#chooseBg").hide();
        $("#mask-container").remove();
        $("#menu .tip").hide();
        if (!classSelf.mySwiper2) {
            classSelf.initChooseText();
        }
    });

    //喜欢背景/祝福点击事件
    $(".lick-btn").click(function() {
        var dataNumber = $(this).attr("data-number");
        //1是背景  2是祝福
        if (dataNumber == "1") {
            $("[name = 'bg']").val($("#content").attr("class"));
            $("#chooseBg").hide();
            if (!$("[name='text']").val()) {
                classSelf.createMask();
                $("#menu .tip[data-number='2']").show();
            }
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
        classSelf.createMask();
        $(".tip[data-number='1']").show();
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
            $("#mask-container").remove();
            $("#contract").hide();
            $("#content .text>div").html('').html($("[name='username']").val());
            $("[name='wechatTitle']").val("Merry Christmas 我愿为你种星辰");
            $("[name='wechatContent']").val($("[name='username']").val() + "已经把对你的祝福种进悟空「圣诞星辰卡」，快打开看看吧~");
            $("[name='wechatUrl']").val(window.location.href + "?bg=" + $("[name='bg']").val() + "&text=" + $("[name='text']").val() + "&name=" + $("[name='username']").val());
            $("#menu").hide();
            $(".music").hide();
            classSelf.html2Canvans();
            $(".music").show();
            $("#content").hide();
            $("#savePic").show();
            $("#sendMess").show();
            new WechatShareController();
        }
    });
    //输入姓名事件
    $("body").delegate('#name', 'change', function() {
        $("[name='username']").val($(this).val());
    });
    $("#guide").click(function() {
        $(this).hide();
        $(".guide").show();
    });
    $("#tipsSubmit").click(function() {
        $("#tips").fadeOut();
        $("#mask-container").remove();
        if (!$("[name='contract']").is(':checked')) {
            $("#contract").show();
        }
    });
    //送出祝福
    window.addEventListener('resize', function(e) {
        var $name = $('#name');
        $name[0].scrollIntoView(false);
    });

    //输入姓名获取焦点，去除class
    $("body").delegate('#name', 'click', function() {
        $(this).parents(".animate").removeClass("animate");
    });

    $("#sendMess").click(function() {
        $("#guide").fadeIn();
        $(".music").fadeOut();
    });
    $("#submit").click(function() {
        //检查是否选了祝福语
        if (!$("[name='text']").val()) {
            $(".tip").hide();
            $("#mask-container").remove();
            $("#chooseText").show();
            if (!classSelf.mySwiper2) {
                classSelf.initChooseText();
            }
            return false;
        }
        //检查姓名
        if (!$("[name='username']").val()) {
            classSelf.tips("请填写姓名!");
            return false;
        }
        var reg = /^[a-zA-Z\u4e00-\u9fa5]+$/;
        if (!reg.test($("#name").val())) {
            classSelf.tips("请填写正确的姓名!");
            return false;
        }
        //检查是否10个字
        if ($("#name").val().length > 10) {
            classSelf.tips("姓名最多10个字符!");
            return false;
        }

        $("#contract").fadeIn();
        classSelf.createMask();
        $("#mask-container").css("z-index", "1001");
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
                $("#start").css("bottom", "40px");
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
    var classSelf = this;
    $("#tips").show();
    if (!$("#mask-container").length) {
        classSelf.createMask();
    }
    $("#mask-container").css("z-index", "1001");
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
