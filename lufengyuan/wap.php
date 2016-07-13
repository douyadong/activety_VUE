<?php require_once("../global.php") ; ?>
<?php    
    $confs = array(
        "extra_stylesheets" => array("wap-two.min.css") ,  //app.min.css，还需要加载额外的样式表吗？有，请写在数组里面
        "extra_javascripts" => array(),  //除了加载app.min.js | require.js | 本页控制器外，是否还需要预先加载其他资源
        "img_length" =>13, //这个活动页图片的数量,h5没有banner
        "match_stylesheet" => false ,  //是否需要匹配路由的样式表
        "match_javascripts" => true ,  //是否需要匹配路由的脚本文件
        "match_reserve" =>true,
        "match_wechatShare" => true,  //是否需要加载微信分享
        "page_keywords" => "华谊禄丰苑  双享配套  主题中央花园  内外双景 户户双阳台",   //这个是页面keywords
        "page_description" =>"华谊禄丰苑位于嘉定区马陆镇，在嘉定主城区东南位置，南邻上海绕城高速公路，西邻澄浏中路，近享老城和新城双享配套。项目由4栋小高层公寓和1栋沿街商业楼组成，四大主题中央花园，东临天然河道，景观资源得天独厚，内外双景、户户双阳台、卧室均带飘窗。" ,//这个是页面content
        "page_title" => "华谊禄丰苑",  //每个页面标题会在这个字符串后面自动追加 " - 悟空找房"      
        "subEstateId" =>"145678",    //房产ID
        "subEstateName"=>"华谊禄丰苑", //房产名称
        "wechatTitle"=>"华谊禄丰苑  精致人文社区" , //微信分享的标题
        "wechatContent" =>"合理的整体布局规划，精细的内部打造实现产品的'精致'性，通过集中的景观绿化打造及一流的物业服务拉近了邻里间的关系，是嘉定地区为数不多的精致人文社区" ,  //微信分享的内容
        "generateHtmlName" =>"wap.html",    //生成的html名称
        "hotline"=>"tel:4009230626" //热线电话
    ) ;    
?>
<?php
    ob_start() ;
?>
<!--header-->
<?php require_once("../components/headWap.php") ; ?>          
<div class="w-warpper" style="background-color:#f5f5f5;padding-bottom:45px;"> 
    <img src="../css/images/lufengyuan/lufengyuanE_1.jpg" />
    <img src="../css/images/lufengyuan/lufengyuanE_2.jpg" />
    <a href="<?php echo $confs["hotline"]?>"><img src="../css/images/lufengyuan/lufengyuanE_3.jpg" /></a>
    <!--页面正文内容部分,图片堆砌-->
    <?php require_once("../components/wap-content.php") ; ?>  
    <!--页面底部预约的fixed的按钮-->
    <?php require_once("../components/wap-reserve-fixed.php") ; ?>  
 </div> 
<!--全局的预约框-->
<?php require_once("../components/wap-reserve-dialogue.php") ; ?>       
<!--微信预约-->
<?php require_once("../components/wechat-share.php") ; ?>  
<!--footer-->
<?php require_once("../components/footerWap.php") ;  ?>
<?php
    $info = ob_get_contents();       //得到缓冲区的内容并且赋值给$info  
    $file_name = $confs["generateHtmlName"] ;
    $file = fopen($file_name, 'w') ;
    fwrite($file, $info);            
    fclose($file) ;
?>

