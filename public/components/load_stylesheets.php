<!-- 引入stylesheet资源 -->
<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/public/css/app.min.css"?>" />
<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/public/css/" .$router['page_type'] . ".min.css" ?>" />
<?php if( sizeof($config["extra_stylesheets"]) > 0 ) {
    for($m = 0 ; $m < sizeof($config["extra_stylesheets"]) ; $m ++ ) {
?>
<link rel="stylesheet" href = "<?php echo $config["extra_stylesheets"][$m]; ?>">
<?php } } ?>
<?php
    if($config["match_stylesheet"]) {
?>
<link rel="stylesheet" href="<?php echo "$CURRENT_STATIC_DOMAIN/" . $router["activity_name"]?>/css/<?php echo $router["page_type"]?>.min.css">
<?php } ?>