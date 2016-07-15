<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no,email=no">
        <meta name="ML-Config" content="fullscreen=yes,preventMove=no">
        <title><?php echo $config["page_title"] ; ?></title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>"> 
        <!-- 引入stylesheet资源 -->
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN"?>/activity/public/css/app.min.css">
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN"?>/activity/public/css/wap.min.css">
        <?php if( sizeof($config["extra_stylesheets"]) > 0 ) {
            for($m = 0 ; $m < sizeof($config["extra_stylesheets"]) ; $m ++ ) {
        ?>
        <link rel="stylesheet" href = "<?php echo $STATIC_DOMAIN ; ?>/activity/<?php echo $router["controller"]?>/css/<?php echo str_replace('.css','.min.css',$config["extra_stylesheets"][$m]) ; ?>">
        <?php } } ?>
        <?php
            if($config["match_stylesheet"]) {
        ?>
        <link rel="stylesheet" href="<?php echo "$STATIC_DOMAIN/activity/" . $route["controller"] . "/css/wap.min.css" ?>css/wap.min.css">
        <?php } ?>
    </head>
    <body>