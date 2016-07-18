<?php
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
     读取config.js里面的环境参数
     -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    function get_stage_domain($options) {
        $config_file = "../config.js" ;
        $config_file_handle = fopen($config_file, "r") ;
        $config_file_contents = fread($config_file_handle, filesize ($config_file)) ;
        fclose($config_file_handle) ;
        $config_content_array = explode("=", $config_file_contents) ;        
        $stage_enviorment = strtolower(substr($config_content_array[1], strpos($config_content_array[1], "'") + 1, strripos($config_content_array[1], "'") -2)) ;    

        foreach($options as $key => $val){
            if($key === $stage_enviorment){
                return $val;
            }
        }

        return "";
    }    
    $STATIC_DOMAIN = get_stage_domain(array(
        "development"=>"//dev01.fe.wkzf",
        "test"=>"//test01.fe.wkzf",
        "sim"=>"//sim01.fe.wkzf",
        "production"=>"//cdn01.wkzf.com"
    ));    //静态资源域名   
    $CURRENT_STATIC_DOMAIN =  get_stage_domain(array(
        "development"=>"//devhd.fe.wkzf",
        "test"=>"//testhd.fe.wkzf",
        "sim"=>"//simhd.fe.wkzf",
        "production"=>"//hd.wkzf.com"
    ));    //当前域名
    //取得当前模板页面的末级目录和文件名不带后缀的
    $uri_components = explode("/", $_SERVER["PHP_SELF"]) ;
    $router = array() ;
    $router["activity_name"] = strtolower($uri_components[sizeof($uri_components) - 2]);
    $router["page_type"] = strtolower(substr($uri_components[sizeof($uri_components) - 1], 0, strpos($uri_components[sizeof($uri_components) - 1], ".")));
?>