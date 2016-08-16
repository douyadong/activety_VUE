<div class="container">
        <div class="header">
            <div class="banner" style="background-color:#f6f6f5;background-position: center center;background-image:url(<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/web_banner.jpg)"></div>
            <!--<img class="banner" src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/web_banner.jpg" />-->
        </div>
        <div class="content">
            <?php
                foreach($config["sections"] as $section){
            ?>
                <section>
                <div class="section-header">
                    <div class="section-header-content">
                        <div class="section-header-body">
                            <h2 class="section-title"><?php echo $section['name']?></h2>
                        </div>
                    </div>
                </div>
                <p class="more">
                    <a href="<?php echo $section['webLink']?>">查看更多 &gt;&nbsp;&nbsp;</a>
                </p>
                <?php
                    foreach ($section['estates'] as $item) {
                ?>
                    <div class="item">
                    <a class="img" href="<?php echo $item['webLink'] ?>">
                        <img class='lazy' src="" data-src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/web/<?php echo $item['webImg']?>"  alt=""/>
                        <span class="price"><?php echo $item['price']?><span class="subfix">元/m<sup>2</sup></span></span>
                    </a>
                    <div class="desc">
                        <div class="estate_name"><?php echo $item['estateName']?></div>
                        <div class="contact">
                            <span class="hotline"><?php echo $item['hotline']?></span><span class="translate">转</span><span class="hotline_subnum"><?php echo $item['hotlineSubNum']?></span>
                            <button type="button" class="btn_reserve" data-id="<?php echo $item['estateId']?>" data-name="<?php echo $item['estateName']?>">预约看房</button>
                        </div>
                        
                    </div>
                </div>
                <?php
                    }
                ?>
                                
            </section>
            <div style="clear:both"></div>
            <?php

                }
            ?>                    
        </div>
        <div class="footer">
        	<div class="content">
				<a href="http://www.wkzf.com" class="logo">
					<img src="http://static.wkzf.com/web_fe/img/source/public/bottom_logo.png"/>
				</a>
				<p class="copy-right">&copy;2015 悟空找房. All right reserved. 沪ICP备14043484号-1</p>
        	</div>            
        </div>
    </div>
    <div class="reserve-form">
	<div class="content">
		<h3>看房预约</h3>
		<div class="item">
			<label>姓名:</label> <input type="text" placeholder="请输入姓名" name="name" />
		</div>
		<div class="item">
			<label>电话:</label> <input type="text" placeholder="请输入电话号码" name="phoneNumber"/>
		</div>
		<div class="item">
			<label>验证码:</label> <input type="text" placeholder="请输入验证码" name="verifyCode" /><button class="sendCodeBtn" id="sendCodeBtn">获取验证码</button>
		</div>
		<p class="tips-txt"></p>
		<div class="footer">
			<button class="confirmReserveBtn">确认预约</button>
			<button class="cancelBtn">取消</button>
		</div>
	</div>
</div>
<div class="success-dialog">
    <div class="success-dialog-bg"></div>
    <div class="w-alert-win" style="background: url('//devhd.fe.wkzf/public/images/reserve_success.jpg') no-repeat scroll;"><span id="closeSuccess"></span></div>
</div>