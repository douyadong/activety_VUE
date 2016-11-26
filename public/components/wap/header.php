<!--body .header-->
<div class="header">
	<?php
		$hotline = empty($config['wap_hotline'])?$config['hotline']:$config['wap_hotline'];
		$hotline_subnum = empty($config['wap_hotline_subnum'])?(empty($config['hotline_subnum'])?'':$config['hotline_subnum']):$config['wap_hotline_subnum'];
	?>
	<img class="lazy" src="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"] ?>/images/wap_banner.jpg" style="display: inline;" />
    <a class="hotline" href="tel:<?php echo $hotline?>"><span class="icon-phone"></span><?php echo $hotline?> <?php echo empty($hotline_subnum)?"":"转 " . $hotline_subnum ?></a>
</div>