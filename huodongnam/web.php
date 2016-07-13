	<?php require_once("config.php");?>
		<?php
			ob_start();
		?>
		<?php require_once("../components/headWeb.php");?>
		<a href="http://www.wkzf.com" class="bannerBox">
			<img class="auto" src="../images/web_banner.jpg" style="display: block;width:1024px;margin:0 auto;" />
		</a>
		<img src="images/web_banner.jpg" />

		<div class="content-wrapper"> 
    		<div class="tools">
	        	<img src="images/web_header.jpg" style="margin-top: -175px;" id="banner3"/>
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
        		require_once("../components/fixedBottom-three.php") ;
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
<script type="text/javascript" src="js/web.min.js"></script>
<?php
    $info = ob_get_contents();  
    require_once('../components/savefile.php'); 
    save_file($info);
    //$file_name = $confs["generateHtmlName"];
    //$file = fopen($file_name, 'w'); 
    //fwrite($file, $info);            
    //fclose($file) ;
?>