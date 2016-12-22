<?php
        ob_start();
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>Merry Christmas 我愿为你种星辰</title>
    <meta name="keywords" content="悟空找房,Merry Christams">
    <meta name="description" content="Merry Christmas 我愿为你种星辰">
    <link rel="stylesheet" href="../public/css/app.min.css">
    <link rel="stylesheet" href="./css/index.min.css">
    <link rel="stylesheet" href="http://cdn01.wkzf.com/fe_public_library/wkzf/js/util/swiper/dist/css/swiper.min.css">
</head>

<body data-number="0">
    <section id="loading" style="display:none">
        <div id="man">
            <img src="images/bobsleigh.png">
        </div>
        <div id="process">
            <div id="processInner"></div>
        </div>
        <div id="loadfont">0%</div>
        <div id="start">
            <img src="images/start.png">
        </div>
    </section>
    <section id="content" class="bg_1">
        <div class="text">
        </div>
        <div id="menu">
            <a data-number="1">
                <img src="images/choose_bg.png">
                <span>选张卡片</span>
                <img class="tip" src="images/tips_2.png" data-number="1">
            </a>
            <a data-number="2">
                <img src="images/choose_text.png">
                <span>选个祝福</span>
                <img class="tip" src="images/tips_1.png" data-number="2">
            </a>
            <a id="submit">
                送出祝福<img src="images/sanjiao.jpg">
            </a>
        </div>
    </section>
    <div>
        <a id="makeup" href="/christmas/index.php">
            <div>
                我也要制作悟空圣诞星辰卡<img src="images/sanjiao.jpg">
            </div>
        </a>
    </div>
     <div>
        <a id="savePic" href="javascript:;">
                请长按屏幕保存壁纸
        </a>
    </div>
    <div>
        <a id="sendMess" href="javascript:;">
                送出祝福
        </a>
    </div>
    <div id="chooseBg">
        <div class="choose_content">
            <div class="bg-slider">
                <div id="swiperBg" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-number="1">
                            <img src="images/bg_1.gif">
                        </div>
                        <div class="swiper-slide" data-number="2">
                            <img src="images/bg_2.gif">
                        </div>
                        <div class="swiper-slide" data-number="3">
                            <img src="images/bg_3.gif">
                        </div>
                        <div class="swiper-slide" data-number="4">
                            <img src="images/bg_4.gif">
                        </div>
                    </div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="lick-btn" data-number="1">
                    喜欢这个<img src="images/arrow_2.png">
                </div>
            </div>
        </div>
    </div>
    <div id="chooseText">
        <div class="choose_content">
            <div class="bg-slider">
                <div id="swiperText" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-number="1">
                            <img src="images/text_1.png">
                        </div>
                        <div class="swiper-slide" data-number="2">
                            <img src="images/text_2.png">
                        </div>
                        <div class="swiper-slide" data-number="3">
                            <img src="images/text_3.png">
                        </div>
                        <div class="swiper-slide" data-number="4">
                            <img src="images/text_4.png">
                        </div>
                    </div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="lick-btn" data-number="2">
                    喜欢这个<img src="images/arrow_2.png">
                </div>
            </div>
        </div>
    </div>
    <!--同意条款-->
    <div id="contract">
        <div class="contract_content">
            <p>
                <input type="checkbox" checked name="contract">本人已阅读并同意
            </p>
            <a href="javascript:;" id="showItems">活动规则</a>
            <a href="javascript:;" id="submitContrct">确定</a>
        </div>
    </div>
    <!--提示-->
    <div id="tips">
        <div class="contract_content">
            <p>
            </p>
            <a href="javascript:;" id="tipsSubmit">确定</a>
        </div>
    </div>
    <!--指导-->
    <div id="guide">
        <div class="contract_content">
            <img src="images/guide.png">
        </div>
    </div>
    <!--条款内容-->
    <div id="items">
        <p class="title">活动时间</p>
        <p>2016.12.22-2016.12.26</p>
        <p class="title">活动条款</p>
        <p>感谢您参与悟空找房2016圣诞贺卡活动（下称“本活动”）。请仔细阅读下面的活动条款。</p>
        <p class="title">一、活动条款的确认和接受</p>
        <p>本活动由悟空找房举办，与本活动有关的所有权利均由主办方所有。本活动将按照本条款执行。本活动的参与者（简称为“用户”）通过本活动制作及/或分享圣诞贺卡，即表示用户已经接受本活动所有条款。</p>
        <p class="title">二、用户的承诺及义务</p>
        <p>1. 用户确保其参与活动并制作、分享的圣诞贺卡符合公序良俗，遵守法律法规的规定，不存在任何侵犯主办方或第三方合法权益的内容和信息。</p>
        <p>2. 用户因从事任何上述行为而给主办方或他人造成的损害，用户应自行承担相关责任并应赔偿主办方全部损失，一经发现用户违反本活动条款，主办方有权在任何时间、不经事先通知，而对相关作品进行删除并取消用户参与活动的资格。</p>
        <p>3. 用户认可，在按本活动条款提交信息时，即允许主办方及其他关联公司作为宣传及促销等目的的需要以任何方式使用用户提交的信息的全部或部分及对该信息的编辑或汇编等，包括但不限于用户的姓名或其他名称。</p>
        <p class="title">三、免责声明</p>
        <p>1. 主办方保留根据客观情况不时地修改本活动条款的权利。</p>
        <p>2. 主办方将尽力确保本活动的顺利进行，但若因特定原因（包括但不限于设备或系统维护、互联网络、电脑、通讯或其他系统的故障，行政决定或第三方的不作为等）而使本活动因此无法进行时，主办方有权暂停或取消本活动，且主办方不承担任何法律责任。</p>
        <p>3. 未经主办方授权或许可的，任何单位或个人不得通过任何形式，以任何方法使用、截取、篡改本活动中产生的活动页面或页面（包括HTML5页面），或采取任何其他未经授权或许可的行为。主办方保留与此相关的一切权利。</p>
        <p class="title">四、活动相关内容的所有权</p>
        <p>与本次活动相关的内容，包括但不限于文字、软件、声音、音乐、相片、录像、图标，在广告中出现的全部内容，电子邮件的全部内容，本活动过程中为用户提供的商业信息等受版权、商标和其他财产所有权法律的保护。用户不得擅自复制、篡改、使用相关商标、内容或创造有关的派生产品。</p>
        <p class="title">在法律允许的范围内，悟空找房有权对上述活动的条款作出合理解释和/或补充说明。</p>
        <a href="javascript:;" id="itemSubmit">我知道了</a>
    </div>
    <audio id="audio" src="images/music.mp3" loop="loop" autoplay="autoplay" data-number="0" preload="true">
        您的浏览器不支持 audio 标签。
    </audio>

    <div class="music" data-number="0">
        <img src="images/music.png">
    </div>

    <!--背景-->
    <input type="hidden" value="bg_1" name="bg">
    <!--祝福-->
    <input type="hidden" value="" name="text">
    <!--姓名-->
    <input type="hidden" value="" name="username">
    <!--微信分享标题-->
    <input type="hidden" value="送出一份暖心圣诞祝福" name="wechatTitle">
    <!--微信分享内容-->
    <input type="hidden" value="把你的星星种进悟空「圣诞星辰卡」，送给TA吧。" name="wechatContent">
    <!--微信分享内容-->
    <input type="hidden" value="" name="wechatUrl">
</body>
<script src="../config.js"></script>
<script src="../public/js/app.min.js"></script>
<script src="http://cdn01.wkzf.com/fe_public_library/wkzf/js/util/swiper/dist/js/swiper.min.js"></script>
<script src="./js/html2canvas.min.js"></script>
<script src="./js/index.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="./js/wechat-share.min.js"></script>

</html>
<?php
require_once("../public/components/save_file.php");
?>
