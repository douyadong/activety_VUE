<html>

<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $config["pageTitle"] ; ?> - 悟空找房</title>
        <meta name="keywords" content="<?php echo $config["pageKeywords"] ; ?>">
        <meta name="description" content="<?php echo $config["pageDescription"] ; ?>">
        <!-- 引入stylesheet资源 -->
        <?php
                if(array_key_exists("extraCsses",$config) && count($config["extraCsses"]) > 0){
                        foreach($config["extraCsses"] as $css)
        ?>
        <link rel="stylesheet" href="<?php echo $css;?>"/>        
        <?php

                }
        ?>
        <?php
        	if(array_key_exists("estateLayout", $config) && $config["estateLayout"] == "2"){
        ?>
        	<link rel="stylesheet" href="<?php echo $CURRENT_STATIC_DOMAIN?>/public/css/alweb-twocolumns.min.css"/>
        <?php
        	}else{
        ?>
        	<link rel="stylesheet" href="<?php echo $CURRENT_STATIC_DOMAIN?>/public/css/alweb.min.css"/>
        <?php
        	}
        ?>               
        <?php
                if(array_key_exists("matchCss", $config) && $config["matchCss"] == "true"){
        ?>
        <link rel="stylesheet" href="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"];?>/css/web.min.css"/>
        <?php
                }
        ?>
</head>

<body>
    