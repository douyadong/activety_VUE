<html>
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
        <title><?php echo $config["pageTitle"] ; ?></title>
        <meta name="keywords" content="<?php echo $config["pageKeywords"] ; ?>">
        <meta name="description" content="<?php echo $config["pageDescripts"] ; ?>"> 
        <!-- 引入stylesheet资源 -->
        <?php
                if(array_key_exists("extraCsses",$config) && count($config["extraCsses"]) > 0){
                        foreach($config["extraCsses"] as $css)
        ?>
        <link rel="stylesheet" href="<?php echo $css;?>"/>        
        <?php

                }
        ?>
	<link rel="stylesheet" href="<?php echo $CURRENT_STATIC_DOMAIN?>/public/css/alwap.min.css"/>
        <?php
                if(array_key_exists("matchCss", $config) && $config["matchCss"] == "true"){
        ?>
        <link rel="stylesheet" href="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"];?>/css/wap.min.css"/>
        <?php
                }
        ?>
	</head>
	<body>	