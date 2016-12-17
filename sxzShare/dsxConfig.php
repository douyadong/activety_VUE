        <?php require_once('../public/global.php')?>
        <?php
            /*
            |--------------------------------------------------------------
            |额外样式表
            |-------------------------------------------------------------- 
            */
            $config["extra_stylesheets"] = array();

            /*
            |--------------------------------------------------------------
            |额外脚本
            |--------------------------------------------------------------
            */            
            $config["extra_javascripts"] = array();

            /*
            |--------------------------------------------------------------
            |页面标题
            |--------------------------------------------------------------   
            */
            $config["page_title"] = "拉大师兄";

            /*
            |--------------------------------------------------------------
            |页面描述
            |--------------------------------------------------------------
            */
            $config["page_description"] = "拉大师兄";

            /*
            |--------------------------------------------------------------
            |页面关键字
            |--------------------------------------------------------------   
            */
            $config["page_keywords"] = "拉大师兄";

            /*
            |--------------------------------------------------------------
            |是否根据路由加载样式表
            |如果匹配则会生成活动目录下的less/[web|wap].less文件
            |--------------------------------------------------------------  
            */
            $config["match_stylesheet"] = true;

            /*
            |--------------------------------------------------------------
            |是否根据路由加载脚本
            |如果匹配则会生成活动目录下的jssrc/[web|wap].js文件
            |--------------------------------------------------------------   
            */
            $config["match_javascripts"] = true;

            /*
            |--------------------------------------------------------------
            |是否包含预约功能
            |--------------------------------------------------------------   
            */
            $config["include_reserve"] = true;

            /*
            |--------------------------------------------------------------
            |房产Id,调用预约接口时使用
            |房产名称
            |--------------------------------------------------------------   
            */
            $config["estate_Id"] = "adad";
            $config["estate_name"] = "adadad";

            /*
            |--------------------------------------------------------------
            |是否支持微信分享
            |微信分享标题
            |微信分享内容
            |--------------------------------------------------------------   
            */
            $config["wechat_share"] = false;
            $config["wechat_title"] = "";
            $config["wechat_content"] = "";

            /*
            |--------------------------------------------------------------
            |热线电话
            |分机号码
            |--------------------------------------------------------------   
            */
            $config["hotline"] = "";
            $config["hotline_subnum"] = "";

            $confs["module_img_path"]=$CURRENT_STATIC_DOMAIN . "/sxzShare/images"
        ?>                        