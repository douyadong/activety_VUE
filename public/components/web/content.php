<!--webcontainer content-->
<div class="content">
	<!--标题图片-->
	<div class="title">
		<img src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/images/web_title.jpg"?>" id="banner3" />
	</div>
	<!--分享QQ、新浪微博和微信-->
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
		//读取活动目录下的images/wap目录中的图片
		$dir = 'images/web';	
		if(is_dir($dir)){
			if($dh = opendir($dir)){
				require_once('../public/components/get_extension.php');
				require_once('../public/components/is_valid_image_extension.php');
				while($file = readdir($dh)){
					$extension_name = get_extension($file);
					//判断是否合法的图片后缀名
					if($file != '..' && $file != '.' && is_valid_image_extension($extension_name)){					
						echo "<img class='lazy' data-src='$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] . "/$dir/$file' />";			
					}
				}
			}
		}
	?>
</div>