<?php require_once("../global.php") ; ?>
<?php    
    $confs = array(
        "extra_stylesheets" => array("web-two.min.css"),  //app.min.css，还需要加载额外的样式表吗？有，请写在数组里面
        "extra_javascripts" => array(),  //除了加载app.min.js | require.js | 本页控制器外，是否还需要预先加载其他资源
        "generateHtmlName" =>"web.html" ,   //生成的html名称
        "img_length" =>9,  //这个活动页图片的数量，除去banner,banner为平铺
        "page_title" => "华谊禄丰苑" ,  //每个页面标题会在这个字符串后面自动追加 " - 悟空找房"
        "page_keywords" =>"华谊禄丰苑  双享配套  主题中央花园  内外双景 户户双阳台" ,  //这个是页面keywords
        "page_description" =>"华谊禄丰苑位于嘉定区马陆镇，在嘉定主城区东南位置，南邻上海绕城高速公路，西邻澄浏中路，近享老城和新城双享配套。项目由4栋小高层公寓和1栋沿街商业楼组成，四大主题中央花园，东临天然河道，景观资源得天独厚，内外双景、户户双阳台、卧室均带飘窗。" ,//这个是页面content
        "match_stylesheet" => false ,  //是否需要匹配路由的样式表
        "match_javascripts" => true ,  //是否需要匹配路由的脚本文件
        "match_reserve" => true , //是否需要全局预约功能
        "subEstateId" =>"145678",    //房产ID
        "subEstateName"=>"华谊禄丰苑", //房产名称
        "match_wechatShare" => false  //是否需要加载微信分享,web站点一般都不需要
    ) ;    
?>
<?php
    ob_start();
?>
<?php require_once("../components/headWeb.php") ; ?>          
<!--banner图片,pc站点banner图为平铺-->
<a href="http://www.wkzf.com" class="bannerBox"><img class="auto" src="../css/images/lufengyuan/lufengyuan_banner-1.jpg" /></a>
<img src="../css/images/lufengyuan/lufengyuan_banner-2.jpg" />
<div class="content-wrapper"> 
    <div class="tools">
        <img src="../css/images/lufengyuan/lufengyuan_0.jpg" style="margin-top: -175px;" id="banner3"/>
        <div class="time">悟空找房:1小时前</div>
        <div class="bdsharebuttonbox bdshare-button-style1-16" data-bd-bind="1463745861162">
            <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>    
            <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>    
            <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
        </div>
    </div>   
<!--页面正文内容部分,图片堆砌-->        
    <?php require_once("../components/web-content.php") ;?>    
</div>  
<!--web站点全局的预约框-->
<?php
    if($confs["match_reserve"]) {
        require_once("../components/fixedBottom-two.php") ;
        require_once("../components/webSuccess.php") ;  
    ?>
<?php  }  ?>

<div class="publicFooter">
    <div class="indexMainFrame">
        <div class="logoPhone">
          <div class="logo"><a href="http://www.wkzf.com"><img src="http://static.wkzf.com/web_fe/img/source/public/bottom_logo.png" width="170" height="40"></a></div>
          <!-- <p class="phone">服务热线：400-821-5365</p> -->
        </div>
        <div class="bottom">
        <div class="indexMainFrame">
            <span>©2015 悟空找房. All right reserved. 沪ICP备14043484号-1</span>
        </div>
    </div>
    </div>
</div>
 <script>
    window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "",
            "bdMini": "2",
            "bdMiniList": false,
            "bdPic": "",
            "bdStyle": "1",
            "bdSize": "16"
        },
        "share": {},
        "selectShare": {
            "bdContainerClass": null,
            "bdSelectMiniList": ["tsina", "tqq", "weixin", "qzone"]
        }
    };
    with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
<!--footer-->
<?php require_once("../components/footerWeb.php") ;  ?>
<script type="text/javascript" src="../js/lufengyuan/web.min.js"></script>
<?php
    $info = ob_get_contents();    
    $file_name = $confs["generateHtmlName"];
    $file = fopen($file_name, 'w'); 
    fwrite($file, $info);            
    fclose($file) ;
?>
