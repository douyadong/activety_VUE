<!--body .header-->
<div class="header">
	<img class="lazy" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] ?>/images/wap_banner.jpg" style="display: inline;" />
    <a class="hotline" href="tel:<?php echo $config['hotline']?>"><span class="icon-phone"></span><?php echo $config['hotline']?> <?php echo empty($config['hotline_subnum'])?"":"转 " . $config['hotline_subnum'] ?></a>
</div>