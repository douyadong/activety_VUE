<!--wap-->
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
<!--app.min.js-->
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>

<?php
    if($router["page_type"] === "web"){
?>
    <script>
          //_bd_share_config是提供给下面的share.js使用的
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
          //web页面中分享QQ、微信和微博
          with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
        </script>
<?php        
    }
?>
<!--额外脚本文件-->
<?php
    for( $n = 0 ; $n < sizeof($config["extra_javascripts"]) ; $n ++ ) {
?>
<script src="<?php echo $config["extra_javascripts"][$n]; ?>"></script>
<?php } ?>
        
<!--微信分享，wap才有-->        
<?php
    if($router["page_type"] === "wap" && $config["wechat_share"]) {
      require_once("../public/components/wap/wechatshare.php") ; 
    }
?>     
<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/<?php echo $router['page_type']?>.min.js"></script>
<?php
    if($config["match_javascripts"]) {//匹配路由脚本
?>
<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/" . $router['page_type'] . ".min.js" ?>"></script>
<?php 
    }
?>        
<?php require_once("../public/components/GA_Baidu_statistic.php");?>