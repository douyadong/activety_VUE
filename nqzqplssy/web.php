<?php require_once("config.php");?>
<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!-- 引入stylesheet资源 -->
       <link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/public/css/app.min.css"?>" />
        <?php
            if($config["match_stylesheet"]) {
        ?>
        <link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/css/<?php echo $router["page_type"]?>.min.css">
        <?php } ?>
    </head>
    <body>
        <div class="wrapper">
            <div class="banner">
                <img src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/pc_background.jpg" alt="">
            </div>
            <div class="table-container">
                <div class="arrow left-arrow"></div>
                <img class="table" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/table.png" alt="">
                <div class="item">
                    <div class="desc">
                        <h1>豆沙月饼</h1>
                        <p>红豆沙月饼是用红豆制成。农历八月十五日是传统的中秋节，食用月饼是中国传统食俗。</p>
                    </div>
                    <div class="down-arrow"></div>
                </div>
                <img class="cake cake1" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                <img class="cake cake2" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                <img class="cake cake3" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                 <img class="cake cake4" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                 <img class="cake cake5" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                 <img class="cake cake6" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                  <img class="cake cake7" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                 <img class="cake cake8" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                <img class="cake cake9" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/cake.png" alt="">
                <div class=" arrow right-arrow"></div>
            </div>
        </div>
    <!--web-->
    <script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
    <!--app.min.js-->
    <script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
    <?php
        if($config["match_javascripts"]) {//匹配路由脚本
    ?>
    <script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/js/" . $router['page_type'] . ".min.js" ?>"></script>
    <?php 
        }
    ?>    
    <!--GA-PC-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-68700668-1', 'auto');
      ga('send', 'pageview');
    </script>

    <!--统计PC-->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?8df1462c3aefb29d3726b7cf07dfab8b";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
    </body>
</html>
<?php
    require_once("../public/components/save_file.php");
    ob_end_flush();
?>  