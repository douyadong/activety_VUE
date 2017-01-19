/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：悟空找房业务系统前端MVC框架
 2. 页面名称：Controller (每个页面的类都继承于这个控制器基类)
 3. 作者：zhaohuagang@lifang.com
 4. 备注：对api的依赖：jQuery
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function Controller() {
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    静态资源域名序列随机化，为什么要定义在上面，因为在后面定义的话前面用这个方法取不到
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.randomDomainSn = function () {
        var sn = Math.floor(Math.random() * 10 + 1).toString();
        if (sn.length < 2) sn = "0" + sn;
        return sn;
    };
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    对环境的定义：
    @development : 开发环境，对应静态资源域名为：dev.01.wkzf - dev.10.wkzf
    @test：测试环境，对应静态资源域名为：test.01.wkzf - test.10.wkzf
    @sim：sim环境，对应静态资源域名为：sim01.wkzf.com - sim10.wkzf
    @production ：生产环境，对应静态资源域名为：cdn01.wkzf.com - cdn10.wkzf.com
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    //this.environment = "development" ; //环境定义
    this.environment = STAGE_ENVIRONENT;

    this.staticDomain = "//devhd.fe.wkzf";
    if (this.environment === "test") this.staticDomain = "//testhd.fe.wkzf";
    else if (this.environment === "sim") this.staticDomain = "//simhd.fe.wkzf";
    else if (this.environment === "prod") this.staticDomain = "//hd.wkzf.com";

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    整个应用Ajax请求的时候的数据类型，是json还是jsonp，开发环境用jsonp，其他环境用json
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.apiDataType = "jsonp";
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    接口的地址，把整个应用的所有接口地址写在这里，方便统一维护    
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.apiPrefix = "//10.0.18.78:8134/"; //api接口地址前缀  
    if (this.environment === "test") this.apiPrefix = "//10.0.18.79:8134/";
    else if (this.environment === "beta") this.apiPrefix = "//wechat-beta.wkzf.com/";
    else if (this.environment === "sim") this.apiPrefix = "//wechat.sim.wkzf/";
    else if (this.environment === "prod") this.apiPrefix = "//wechat.wkzf.com/";

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    服务端微信跳转地址，域名配置    
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.wechatPrefix = "//wechat-dev.yfyk365.com/";
    if (this.environment === "test") this.wechatPrefix = "//wechat-test.yfyk365.com/";
    else if (this.environment === "sim") this.wechatPrefix = "//wechat-sim.yfyk365.com/";
    else if (this.environment === "prod") this.wechatPrefix = "//wechat.wkzf.com/";

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    系统各个模块API地址
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.apiUrl = {
        "wechat": {
            "getPhoneVertifyCode": this.apiPrefix + "actOrder/getPhoneVertifyCode.rest", //获取验证码
            "saveData": this.apiPrefix + "actOrder/saveData.rest" //保存提交的数据
        },
        "olympics": {
            "getPhoneVertifyCode": this.apiPrefix + "actActOlympics/getPhoneVertifyCode.rest",
            "query": this.apiPrefix + "actActOlympics/query.rest",
            "add": this.apiPrefix + "actActOlympics/insert.rest"
        },
        "annualmeeting": {
            "getCityCount": this.apiPrefix + "ay/getActivateCityOfCount.rest",
            "getPhotoInfoById": this.apiPrefix + "ay/getPhotoInfoById.rest",
            "getPhotoInfoByOpenId": this.apiPrefix + "ay/getPhotoInfoByOpenId.rest",
            "getHotPhotos": this.apiPrefix + "ay/getHotPhotos.rest",
            "getNewPhotos": this.apiPrefix + "ay/getNewPhotos.rest",
            "getPhotoInfoById": this.apiPrefix + "ay/getPhotoInfoById.rest",
            "addPhoto": this.apiPrefix + "ay/addPhoto.rest",
            "addThumbs": this.apiPrefix + "ay/addThumbs.rest",
            "delThumbs": this.apiPrefix + "ay/delThumbs.rest",
            "delPhoto": this.apiPrefix + "ay/delPhoto.rest"
        }
    };

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    跳转URL 配置
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.redirectUrl = {
        "olympics": {
            "detail": this.staticDomain + '/olympic/detail.php'
        },
        "annualmeeting": {
            "index": this.wechatPrefix + "ay/index.html",
            "publish": this.wechatPrefix + "ay/publish.html",
            "success": this.wechatPrefix + "ay/success.html",
            "share": this.wechatPrefix + "ay/share.html"
        }
    }

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    标记字段
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.allowed = true; //是否允许点击 “获取验证码” 标记
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    发送Ajax请求的方法：
    @apiUrl：请求的url地址
    @data：请求附带发送的参数数据
    @params：{
        @type：请求的类型，可以是：GET|POST，但是如果apiDataType参数指为jsonp的话，这里设置为POST有没有任何意义，因为jsonp只能是GET
        @apiDataType：接口数据类型，可以是：json|jsonp|script等
        @showLoadingTips：加载过程中是否显示提示信息，可以为null，默认显示，如果要关闭，请设置值为 false
        @loadingTips：加载过程中显示的提示信息内容，默认为："正在加载数据，请稍等..."
        @proc
        ess：code==200的时候的回调接口方法
        @onExceptionInterface：发生错误的时候的回调接口方法
    }    
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.request = function (apiUrl, data, params) {
        var classSelf = this;
        var type = (params === null || params.type === null || params.type === undefined) ? "GET" : params.type;
        if (this.environment !== "production") type = "GET"; //只要是jsonp请求，type肯定为GET
        var process = (params === null || params.process === null || params.process === undefined) ? null : params.process;
        var showLoadingTips = (params === null || params.showLoadingTips === null || params.showLoadingTips === undefined) ? true : params.showLoadingTips;
        var loadingTips = (params === null || params.loadingTips === null || params.loadingTips === undefined) ? "正在加载数据，请稍等..." : params.loadingTips;
        var apiDataType = (params === null || params.apiDataType === null || params.apiDataType === undefined) ? this.apiDataType : params.apiDataType;
        var onExceptionInterface = (params === null || params.onExceptionInterface === null || params.onExceptionInterface === undefined) ? null : params.onExceptionInterface;
        if (this.showLoadingTips) this.tips(loadingTips);
        try {

            var ajaxOptions = {
                url: apiUrl,
                type: type,
                data: data,
                dataType: apiDataType,
                // jsonpCallback: "callback", //这个配置是在没有真正后端接口前端用自己的 json文件模拟接口的时候为了保持callback参数值一致所做的设置
                error: function (e) {
                    //子类提供
                    classSelf.showLog('网络异常');
                },
                success: function (data) {
                    if (data.status.toString() === "1") {
                        if (process) process(data); //一切没有问题，就处理数据
                    } else {
                        if (onExceptionInterface) onExceptionInterface(data); //出了问题，就调用出错函数
                    }
                }
            }

            // if (classSelf.environment != "dev") {
            //     delete ajaxOptions.jsonpCallback;
            // }

            $.ajax(ajaxOptions);
        } catch (e) {

        }
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
        整个try-catch块结束
        -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    };

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    计算时间,是否可以重发验证码
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.countDown = function () {
        var classSelf = this;
        var timeNum = 60; //计时器为60
        classSelf.allowed = false;
        clearInterval(classSelf.timer);
        this.timer = setInterval(function () {
            if (timeNum > 1) { //60s之内，“发送验证码” 按钮，文本为 “过Xs后可重发”
                $("#sendCodeBtn").addClass('disabled');
                timeNum--;
                if (timeNum < 10) { //时间<10s时，时间需要添加"0"
                    $("#sendCodeBtn").text("0" + timeNum + "s后可重发");
                } else {
                    $("#sendCodeBtn").text(timeNum + "s后可重发");
                }
            } else { //60s后，“发送验证码” 按钮，文本变回 “发送验证码”。将allowed置为true，表示可以重新发送验证码。并且清空定时器
                $("#sendCodeBtn").removeClass('disabled');
                $("#sendCodeBtn").text("获取验证码");
                classSelf.allowed = true;
                clearInterval(classSelf.timer);
            }
        }, 1000);
    };

    this.clearCountDown = function () {
        clearInterval(this.timer);
        this.allowed = true;
    }

    /*-----------------------------------------------------------------------------------------------------------
    tips 方法
    -----------------------------------------------------------------------------------------------------------*/
    this.tips = function (msg, callback, time) {
        var classSelf = this;

        var errElm = $('.wk-toast');
        var mask = $("<div id='mask-container'></div>");

        var body = document.body;
        var html = document.documentElement;

        var sHeight = Math.max(body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight);
        var sWidth = document.documentElement.scrollWidth;


        if (mask[0]) {
            mask.remove();
        }

        if (errElm[0]) {
            errElm.remove();
        }

        $(mask).css({
            'background-color': 'rgba(0,0,0,0.5)',
            'position': 'fixed',
            'left': 0,
            'top': 0,
            'height': sHeight + 'px',
            'width': sWidth + 'px',
            'z-index': '999',
            'cursor': 'pointer'
        });

        $(mask).on("click", function () {
            var _this = $(this);
            _this.remove();
            errElm.removeClass('show');
            callback && callback();
        });

        $(document.body).append(mask);

        errElm = $('<div class="wk-toast"></div>').appendTo('body');
        errElm.html(msg).addClass('show');

        setTimeout(function () { // 2400后自动消失，将toastStatus标记置为true,并且执行callback函数
            errElm.removeClass('show');
            $(mask).remove();
            callback && callback();
        }, time || 2000);
    }

    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    根据QueryString参数名称获取值
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    this.getQueryStringByName = function (name) {
        var result = location.search.match(new RegExp("[\?\&]" + name + "=([^\&]+)", "i"));
        if (result == null || result.length < 1) {
            return "";
        }
        return result[1];
    };

    //延迟加载图片
    $(function () {
        $(".lazy").lazyload({
            threshold: 200,
            ignoreInvisible: false
        });
    });

    //关闭成功提示框
    $("#closeSuccess").click(function () {
        $("#Success").hide();
        $("html,body").css({
            'overflow': '',
            'height': 'auto'
        });
        window.location.reload(); //刷新页面
    });
}
