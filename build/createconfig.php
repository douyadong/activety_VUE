<?php
        $extra_stylesheets_str = '"' . implode($extra_stylesheets,'","') . '"';
        $extra_javascripts_str = '"' . implode($extra_javascripts,",") . '"';
        $match_css_str = $match_css?"true":"false";
        $match_js_str = $match_js?"true":"false";
        $wechat_share_str = $wechat_share?"true":"false";
        $inlcude_reserve_str = $include_reserve?"true":"false";                  

        $config_content = <<<config_content
        <?php require_once('../global.php')?>
        <?php
            \$confs = array(
                'extra_stylesheets' => array($extra_stylesheets_str),
                'extra_javascripts' => array($extra_javascripts_str),
                'page_title' => "$page_title",
                'page_keywords' => "$page_keywords",
                'page_description' => "$page_description",
                'match_stylesheet' => $match_css_str,
                'match_javascripts' => $match_js_str,
                'match_reserve' => $inlcude_reserve_str,
                'subEstateId' => "$estate_Id",
                'subEstateName' => "$estate_name",
                'match_wechatShare' => $wechat_share_str,
                'wechatTitle' => "$wechat_title",
                'wechatContent' => "$wechat_content",
                'hotline' => ''
            );
        ?>                        
config_content;

    file_put_contents("../$activity_name/config.php", $config_content);
?>