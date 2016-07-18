<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $config["page_title"] ; ?> - 悟空找房</title>
        <meta name="keywords" content="<?php echo $config["page_keywords"] ; ?>">
        <meta name="description" content="<?php echo $config["page_description"] ; ?>">
        <!-- 引入stylesheet资源 -->
        <?php require_once("../public/components/load_stylesheets.php");?>
    </head>
    <body class="<?php echo $config["include_reserve"]?"include-reserve":""?>">