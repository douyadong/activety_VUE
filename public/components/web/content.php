<!--webcontainer content-->
<div class="content">
	<!--标题图片-->
	<div class="title">
		<img src="<?php echo "$STATIC_DOMAIN/activity/" . $router["controller"] . "/images/web_title.jpg"?>" id="banner3" />
	</div>

	<div class="tools">        
        <div class="time">悟空找房:1小时前</div>
        <div class="bdsharebuttonbox bdshare-button-style1-16" data-bd-bind="1463745861162">
            <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>    
            <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>    
            <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
        </div>
    </div> 

    <!--web端图片堆砌部分-->
	<?php 
		$dir = 'images/web';	
		if(is_dir($dir)){
			if($dh = opendir($dir)){
				while($file = readdir($dh)){
					if($file != '..' && $file != '.'){					
						echo "<img class='lazy' data-src='$STATIC_DOMAIN/activity/" . $router["controller"] . "/$dir/$file' />";			
					}
				}
			}
		}
	?>
</div>