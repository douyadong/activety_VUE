<!--web端图片堆砌部分-->
<?php 
for( $a = 1 ; $a <=$confs["img_length"] ; $a ++) {
?>
	<img class="lazy" data-src="../css/images/<?php echo $router["controller"] ; ?>/<?php echo $router["controller"] ; ?>_<?php echo $a ; ?>.jpg" />
<?php } ?> 
