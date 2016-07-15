<!--wap foot-->
        <!--页面脚本区域-->
        <script src="<?php echo $STATIC_DOMAIN ; ?>/activity/config.js"></script>
        <!--这里是图片懒加载的脚本-->
        <script src="<?php echo $STATIC_DOMAIN ; ?>/activity/public/js/lazy.min.js"></script>
        
        <!--微信分享-->
        <?php require_once("wechatshare.php") ; ?>

        <!--app.min.js wap.min.js-->
        <script src="<?php echo $STATIC_DOMAIN; ?>/activity/public/js/app.min.js"></script>
        <script data-main="<?php echo $STATIC_DOMAIN ; ?>/activity/public/js/wap.min.js" src="<?php echo $STATIC_DOMAIN ; ?>/fe_public_library/wkzf/js/require.min.js"></script>
        <?php
            if($config["match_javascripts"]) {
        ?>
        <script src="<?php echo "$STATIC_DOMAIN/activity/" . $router["controller"] . "/js/wap.min.js" ?>"></script>
        <?php 
            }
        ?>
        <?php
            for( $n = 0 ; $n < sizeof($config["extra_javascripts"]) ; $n ++ ) {
        ?>
        <script src="<?php echo "$STATIC_DOMAIN/activity/" . $router["controller"] . "/js/" . str_replace('.js','.min.js',$config["extra_javascripts"][$n]) ; ?>"></script>
        <?php } ?>

        <!--GA-h5-->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-68700668-2', 'auto');
          ga('send', 'pageview');
        </script>
        <!--统计H5-->
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "//hm.baidu.com/hm.js?691114119912df4f51b1435e553b4a79";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>