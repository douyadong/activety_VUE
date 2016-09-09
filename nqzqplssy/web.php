<?php require_once("config.php");?>
<?php
    ob_start();
    $confs["module_img_path"] = "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]."/images";  
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
                <img src="<?php echo $confs["module_img_path"]?>/pc_background.jpg" alt="">
            </div>
            <div class="table-container">
                <div class="arrow left-arrow"></div>
                <img class="table" src="<?php echo $confs["module_img_path"]?>/table.png" alt="">
                <div class="item" data-dialog="dialog-dousha">
                    <div class="desc">
                        <img src="<?php echo $confs["module_img_path"]?>/white-dousha.png" alt="">
                        <p>红豆沙月饼是用红豆制成。农历八月十五日是传统的中秋节，食用月饼是中国传统食俗。</p>
                    </div>
                    <div class="down-arrow"></div>
                </div>
                <img class="cake cake1 dousha" data-dialog="dialog-dousha" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="豆沙月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-dousha.png" data-desc="红豆沙月饼是用红豆制成。八月十五日中秋节，食用月饼是中国传统食俗。">
                <img class="cake cake2 lianrong" data-dialog="dialog-lianrong" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="莲蓉月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-lianrong.png" data-desc="莲蓉月饼是广东省近代的汉族名点，品种有纯正莲蓉月、榄仁莲蓉月等。">
                <img class="cake cake3 huotui" data-dialog="dialog-huotui" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="火腿月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-huotui.png" data-desc="火腿月饼初创于民国时期的昆明合香楼，是中秋传统节日食品。">
                <img class="cake cake4 wuren" data-dialog="dialog-wuren" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="五仁月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-wuren.png" data-desc="五仁月饼属于广式月饼的一种，在中秋节各式月饼中最为著名。">
                <img class="cake cake5 icecream" data-dialog="dialog-icecream" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="冰激凌月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-icecream.png" data-desc="冰淇淋月饼将中国传统文化和西式食品结合，做成迎合中国人习惯的月饼。">
                <img class="cake cake6 chocolate" data-dialog="dialog-chocolate" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="巧克力月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-chocolate.png" data-desc="巧克力月饼以巧克力为主要材料，以各种口味馅料为辅料制成的非传统月饼。">
                <img class="cake cake7 mocha" data-dialog="dialog-mocha" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="摩卡咖啡月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-mocha.png" data-desc="摩卡咖啡月饼是以咖啡为冰皮制成的新式月饼，属于西点的一种，口感香醇。">
                <img class="cake cake8 haiwei" data-dialog="dialog-haiwei" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="海味月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-haiwei.png" data-desc="海味月饼是比较名贵的月饼，有鲍鱼、鱼翅、紫菜、鳐柱等，以甘香著称。">
                <img class="cake cake9 yanwo" data-dialog="dialog-yanwo" src="<?php echo $confs["module_img_path"]?>/cake.png" alt="燕窝月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-yanwo.png" data-desc="燕窝月饼选用头期燕窝入馅，保证了燕窝纯正的品质。口感柔软，质感细腻。">
                <div class="arrow right-arrow"></div>
            </div>
        </div>
        <?php foreach($config["info"]["data"] as $key => $val){ ?>
          <div class="dialog <?php echo count($val["estate"]) == 3 ? "dialog-three-item":"dialog-five-item" ?> dialog-<?php echo $val["name"]?>">
            <img class="close" src="<?php echo $confs["module_img_path"]?>/close.png" alt="关闭">
            <div class="details">
            <img class="cake-name" src="<?php echo $confs["module_img_path"]?>/brown-<?php echo $val["name"]?>.png" alt="">
            <p class="desc"><?php echo $val["desc"]?></p>
            <?php foreach($val["estate"] as $eskey => $esval){ ?>
              <dl><dt><a href="<?php echo $esval["pcLink"]?>" target="_blank"><img src="<?php echo $confs["module_img_path"]?>/<?php echo $esval["pic"]?>.jpg" alt=""><p><?php echo $esval["name"]?></p></a></dt><dd><img src="<?php echo $confs["module_img_path"]?>/address.png" alt="">地址：<?php echo $esval["address"]?></dd><dd><img src="<?php echo $confs["module_img_path"]?>/price.png" alt="">均价：<?php echo $esval["price"]?></dd><dd><img src="<?php echo $confs["module_img_path"]?>/phone.png" alt=""><?php echo $esval["phone"]?></dd></dl>
            <?php } ?>
            </div>
          </div>
        <?php } ?>
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