        <!--页面脚本区域-->
         <script src="<?php echo $STATIC_DOMAIN ; ?>/activity_template/config.js"></script>
        <!--这里是图片懒加载的脚本-->
        <script src="<?php echo $STATIC_DOMAIN ; ?>/activity_template/js/lazy.min.js"></script>
        <!--这里是微信分享的脚本-->
        <?php
            if($confs["match_wechatShare"]) {
        ?>
            <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
            <script src="<?php echo $STATIC_DOMAIN ; ?>/activity_template/js/wechat-share.min.js"></script>
        <?php } ?>
        <?php
            if($confs["match_javascripts"]) {
        ?>
        <script src="<?php echo $STATIC_DOMAIN ; ?>/activity_template/js/app.min.js"></script>
        <?php } ?>
        <?php
            for( $n = 0 ; $n < sizeof($confs["extra_javascripts"]) ; $n ++ ) {
        ?>
        <script src="<?php echo $confs["extra_javascripts"][$n] ; ?>"></script>
        <?php } ?>
        <?php
            if($confs["match_javascripts"]) {
        ?>
       <script data-main="<?php echo $STATIC_DOMAIN ; ?>/activity_template/js/web.min" src="<?php echo $STATIC_DOMAIN ; ?>/fe_public_library/wkzf/js/require.min.js"></script>
        <?php } ?>
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