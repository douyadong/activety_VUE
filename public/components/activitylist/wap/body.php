<div class="container">
<div class="header">
	<img class="banner" src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/wap_banner.jpg" />
</div>
<div class="content">
	<?php 
		foreach($config['sections'] as $section){
	?>
		<section>
		<h3>
			<?php echo $section['name']?>
			<a href="<?php echo $section['wapLink']?>">查看更多 ></a>
		</h3>
		<?php 
			foreach ($section['estates'] as $item) {
		?>
			<div class="item">
			<a class="img" href="<?php echo $item['wapLink']?>">
				<img class="lazy" data-src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/wap/<?php echo $item['wapImg']?>"/>
				<span class="price"><?php echo $item['price']?><span class="subfix">元/m&sup2;</span></span>
			</a>
			<div class="desc">
				<div class="estate_name"><?php echo $item['estateName']?></div>
				<div class="contact">
					<a href="tel:<?php echo $item['hotline']?>">
					<span class="hotline"><?php echo $item['hotline']?></span><span class="translate">转</span><span class="hotline_subnum"><?php echo $item['hotlineSubNum']?></span></a>
					<button class="btn_reserve" data-id="<?php echo $item['estateId']?>" data-name="<?php echo $item['estateName']?>">预约看房</button>
				</div>				
			</div>
		</div>
		<?php
			}
		?>
		
	</section>
	<?php

		}
	?>

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

<div class="w-dialog success-dialog">
    <div class="w-alert-box success-box">
        <p class="text">看房预约</p>
        <p class="fz14">您的预约已成功，我们的新房顾问将马上与您联系!</p>
        <span id="closeSuccess" class="close-success">确   定</span>
    </div>
</div>