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
        <title><?php echo $confs["page_title"] ; ?></title>
        <meta name="keywords" content="<?php echo $confs["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $confs["page_description"] ; ?>"> 
        <!-- 引入stylesheet资源 -->
        <link rel="stylesheet" href="<?php echo $STATIC_DOMAIN ; ?>/activity_template/css/app.min.css">
        <?php if( sizeof($confs["extra_stylesheets"]) > 0 ) {
            for($m = 0 ; $m < sizeof($confs["extra_stylesheets"]) ; $m ++ ) {
        ?>
        <link rel="stylesheet" href = "<?php echo $STATIC_DOMAIN ; ?>/activity_template/css/<?php echo $confs["extra_stylesheets"][$m] ; ?>">
        <?php } } ?>
        <?php
            if($confs["match_stylesheet"]) {
        ?>
        <link rel="stylesheet" href="<?php echo $STATIC_DOMAIN ; ?>/activity_template/css/<?php echo $router["controller"] ; ?>/<?php echo $router["method"] ; ?>.min.css">
        <?php } ?>
    </head>
    <body>