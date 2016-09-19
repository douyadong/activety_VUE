	<?php require_once("config.php");?>
	<?php
		ob_start();
	?>

	<!DOCTYPE html>
	<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no,email=no">
        <meta name="ML-Config" content="fullscreen=yes,preventMove=no">
        <title><?php echo $config["page_title"] ; ?></title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>"> 
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
		<img src="<?php echo $confs["module_img_path"]; ?>/h5_bg.jpg"  alt="背景">

		<!-- 转动圆盘 -->
		<div class="turntable">
			 <div class="table">
			 	<img src="<?php echo $confs["module_img_path"]; ?>/h5_table.png" alt="">
			 	<img class="cake cake-1 dousha" data-dialog="dialog-dousha" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="豆沙月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-dousha.png" data-desc="红豆沙月饼是用红豆制成。八月十五日中秋节，食用月饼是中国传统食俗。">
				<img class="cake cake-left-2 lianrong" data-dialog="dialog-lianrong" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="莲蓉月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-lianrong.png" data-desc="莲蓉月饼是广东省近代的汉族名点，品种有纯正莲蓉月、榄仁莲蓉月等。">
				<img class="cake cake-left-3 huotui" data-dialog="dialog-huotui" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="火腿月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-huotui.png" data-desc="火腿月饼初创于民国时期的昆明合香楼，是中秋传统节日食品。">
				<img class="cake cake-left-4 wuren" data-dialog="dialog-wuren" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="五仁月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-wuren.png" data-desc="五仁月饼属于广式月饼的一种，在中秋节各式月饼中最为著名。">
				<img class="cake cake-left-5 icecream" data-dialog="dialog-icecream" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="冰激凌月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-icecream.png" data-desc="冰淇淋月饼将中国传统文化和西式食品结合，做成迎合中国人习惯的月饼。">
				<img class="cake cake-right-5 chocolate" data-dialog="dialog-chocolate" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="巧克力月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-chocolate.png" data-desc="巧克力月饼以巧克力为主要材料，以各种口味馅料为辅料制成的非传统月饼。">
				<img class="cake cake-right-4 mocha" data-dialog="dialog-mocha" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="摩卡咖啡月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-mocha.png" data-desc="摩卡咖啡月饼是以咖啡为冰皮制成的新式月饼，属于西点的一种，口感香醇。">
				<img class="cake cake-right-3 haiwei" data-dialog="dialog-haiwei" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="海味月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-haiwei.png" data-desc="海味月饼是比较名贵的月饼，有鲍鱼、鱼翅、紫菜、鳐柱等，以甘香著称。">
				<img class="cake cake-right-2 yanwo" data-dialog="dialog-yanwo" src="<?php echo $confs["module_img_path"]?>/h5_cake.png" alt="燕窝月饼" data-font-src="<?php echo $confs["module_img_path"]?>/white-yanwo.png" data-desc="燕窝月饼选用头期燕窝入馅，保证了燕窝纯正的品质。口感柔软，质感细腻。">
			 </div>
			 
             <div class="item" data-dialog="dialog-dousha">
            	<div class="content">
            		<img class="title" src="<?php echo $confs["module_img_path"]; ?>/white-dousha.png" alt="">
            		<p>红豆沙月饼是用红豆制成。农历八月十五日是传统的中秋节，食用月饼是中国传统食俗。</p>
            	</div>
            	 <!-- 箭头	 -->
            	<span class="arrow"></span>

            </div>	           

            <!-- 点集合 -->
			<div class="spot-list">
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item active">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
				<span class="spot-item">					
				</span>
			</div>
		</div>
	
    </div>

    <?php foreach($config["info"]["data"] as $key => $val){ ?>
      <div class="dialog <?php echo count($val["estate"]) == 3 ? "dialog-three-item":"dialog-five-item" ?> dialog-<?php echo $val["name"]?>">
        <img class="close" src="<?php echo $confs["module_img_path"]?>/close.png" alt="关闭">
        <div class="details">
        <img class="cake-name" src="<?php echo $confs["module_img_path"]?>/brown-<?php echo $val["name"]?>.png" alt="">
        <p class="desc"><?php echo $val["desc"]?></p>
        <?php foreach($val["estate"] as $eskey => $esval){ ?>
          <dl><dt><a href="<?php echo $esval["h5link"]?>" target="_blank"><img src="<?php echo $confs["module_img_path"]?>/<?php echo $esval["pic"]?>.jpg" alt=""><p><?php echo $esval["name"]?></p></a></dt><dd><img src="<?php echo $confs["module_img_path"]?>/address.png" alt="">地址：<?php echo $esval["address"]?></dd><dd><img src="<?php echo $confs["module_img_path"]?>/price.png" alt="">均价：<?php echo $esval["price"]?></dd><dd><a href="<?php echo $esval["linkPhone"]?>"><img src="<?php echo $confs["module_img_path"]?>/phone.png" alt=""><?php echo $esval["phone"]?></a></dd></dl>
        <?php } ?>
        <div class="link" data-dialog="dialog-<?php echo $val["next"]?>"><img src="<?php echo $confs["module_img_path"]; ?>/white-<?php echo $val["next"]?>.png" alt="" ></div>
        </div>
      </div>
    <?php } ?>


	<!-- hammer.js -->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/jssrc/hammer.js"></script>
	
	<!--wap-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/config.js"></script>
	<!--app.min.js-->
	<script src="<?php echo $CURRENT_STATIC_DOMAIN ; ?>/public/js/app.min.js"></script>
        	
	<?php
	    if($config["match_javascripts"]) {//匹配路由脚本
	?>
	<script src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/jssrc/" . $router['page_type'] . ".js" ?>"></script>
	<?php 
	    }
	?>        
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
		<?php
			require_once("../public/components/save_file.php");
			ob_end_flush();
		?>