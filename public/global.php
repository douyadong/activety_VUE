<?php
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     读取config.js里面的环境参数
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    function get_stage_domain() {
        $config_file = "../config.js" ;
        $config_file_handle = fopen($config_file, "r") ;
        $config_file_contents = fread($config_file_handle, filesize ($config_file)) ;
        fclose($config_file_handle) ;
        $config_content_array = explode("=", $config_file_contents) ;        
        $stage_enviorment = strtolower(substr($config_content_array[1], strpos($config_content_array[1], "'") + 1, strripos($config_content_array[1], "'") -2)) ;
        if($stage_enviorment === "development") return "//dev01.fe.wkzf" ;
        else if($stage_enviorment === "test") return "//test01.fe.wkzf" ;        
        else if($stage_enviorment === "sim") return "//sim01.fe.wkzf" ;
        else if($stage_enviorment === "production") return "//cdn01.wkzf.com" ;
    }    
    $STATIC_DOMAIN = get_stage_domain() ;    //静态资源域名    
    //取得当前模板页面的末级目录和文件名不带后缀的
    $uri_components = explode("/", $_SERVER["PHP_SELF"]) ;
    $router = array() ;
    $router["controller"] = $uri_components[sizeof($uri_components) - 2] ;
    $router["method"] = substr($uri_components[sizeof($uri_components) - 1], 0, strpos($uri_components[sizeof($uri_components) - 1], ".")) ;    
?>