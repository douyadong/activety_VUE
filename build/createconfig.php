<?php
        /*
            把额外样式表和脚本文件的列表转换成字符串
        */
        $extra_stylesheets_str = count($extra_stylesheets) == 0 ? "" : '"' . implode($extra_stylesheets,'","') . '"';
        $extra_javascripts_str = count($extra_javascripts) == 0 ? "" : '"' . implode($extra_javascripts,'","') . '"';

        /*
            把匹配路由样式、匹配路由脚本、微信分享和包含预约等bool值转换成字符串。
            因为php中false输出时是空白。
        */
        $match_css_str = $match_css?"true":"false";
        $match_js_str = $match_js?"true":"false";
        $wechat_share_str = $wechat_share?"true":"false";
        $inlcude_reserve_str = $include_reserve?"true":"false";                  

        $config_content = <<<config_content
        <?php require_once('../global.php')?>
        <?php
            /*
            |--------------------------------------------------------------
            |额外样式表
            |-------------------------------------------------------------- 
            */
            \$config["extra_stylesheets"] = array($extra_stylesheets_str);

            /*
            |--------------------------------------------------------------
            |额外脚本
            |--------------------------------------------------------------
            */            
            \$config["extra_javascripts"] = array($extra_javascripts_str);

            /*
            |--------------------------------------------------------------
            |页面标题
            |--------------------------------------------------------------   
            */
            \$config["page_title"] = "$page_title";

            /*
            |--------------------------------------------------------------
            |页面描述
            |--------------------------------------------------------------
            */
            \$config["page_description"] = "$page_description";

            /*
            |--------------------------------------------------------------
            |页面关键字
            |--------------------------------------------------------------   
            */
            \$config["page_keywords"] = "$page_keywords";

            /*
            |--------------------------------------------------------------
            |是否根据路由加载样式表
            |--------------------------------------------------------------  
            */
            \$config["match_stylesheet"] = $match_css_str;

            /*
            |--------------------------------------------------------------
            |是否根据路由加载脚本
            |--------------------------------------------------------------   
            */
            \$config["match_javascripts"] = $match_js_str;

            /*
            |--------------------------------------------------------------
            |是否包含预约
            |--------------------------------------------------------------   
            */
            \$config["include_reserve"] = $inlcude_reserve_str;

            /*
            |--------------------------------------------------------------
            |房产Id,调用预约接口时使用
            |房产名称
            |--------------------------------------------------------------   
            */
            \$config["estate_Id"] = "$estate_Id";
            \$config["estate_name"] = "$estate_name";

            /*
            |--------------------------------------------------------------
            |是否支持微信分享
            |微信分享标题
            |微信分享内容
            |--------------------------------------------------------------   
            */
            \$config["wechat_share"] = $wechat_share_str;
            \$config["wechat_title"] = "$wechat_title";
            \$config["wechat_content"] = "$wechat_content";

            /*
            |--------------------------------------------------------------
            |热线电话
            |分机号码
            |--------------------------------------------------------------   
            */
            \$config["hotline"] = "$hotline";
            \$config["hotline_subnum"] = "$hotline_subnum";
        ?>                        
config_content;

    file_put_contents("../$activity_name/config.php", $config_content);
?>