<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $config["page_title"] ; ?> - 悟空找房</title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>">
        <!-- 引入stylesheet资源 -->
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN/activity"?>/css/app.min.css">
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN/activity"?>/css/web.min.css">
        <?php if( sizeof($config["extra_stylesheets"]) > 0 ) {
            for($m = 0 ; $m < sizeof($config["extra_stylesheets"]) ; $m ++ ) {
        ?>
        <link rel="stylesheet" href = "<?php echo $STATIC_DOMAIN ; ?>/activity/<?php echo $router["controller"]?>/css/<?php echo $config["extra_stylesheets"][$m] ; ?>">
        <?php } } ?>
        <?php
            if($config["match_stylesheet"]) {
        ?>
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN/activity/" . $router["controller"]?>/css/web.min.css">
        <?php } ?>
    </head>
    <body>