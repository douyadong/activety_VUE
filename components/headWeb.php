<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $confs["page_title"] ; ?> - 悟空找房</title>
        <meta name="keywords" content="<?php echo $confs["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $confs["page_description"] ; ?>">
        <!-- 引入stylesheet资源 -->
        <link rel="stylesheet" href="../css/app.min.css">
        <?php if( sizeof($confs["extra_stylesheets"]) > 0 ) {
            for($m = 0 ; $m < sizeof($confs["extra_stylesheets"]) ; $m ++ ) {
        ?>
        <link rel="stylesheet" href = "<?php echo $STATIC_DOMAIN ; ?>/activity_template/css/<?php echo $confs["extra_stylesheets"][$m] ; ?>">
        <?php } } ?>
        <?php
            if($confs["match_stylesheet"]) {
        ?>
        <link rel="stylesheet" href="css/web.min.css">
        <?php } ?>
    </head>
    <body>