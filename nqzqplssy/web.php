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
        <div class="content">
            <div>
                <img src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/pc_background.jpg" alt="">
            </div>
            <div class="table-container">
                <div class="left-arrow"></div>
                <div class="table">
                     <img src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/images/table.png" alt="">
                </div>    
                <div class="right-arrow"></div>
            </div>
        </div>
    <!--web-->
    <script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
    <!--app.min.js-->
    <script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
    <script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/nqzqplssy/js/web.min.js"></script>
    <?php
        if($config["match_javascripts"]) {//匹配路由脚本
    ?>
    <script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/jssrc/" . $router['page_type'] . ".js" ?>"></script>
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