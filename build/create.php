<?php
/*
 1. 项目名称：活动生成页面
 2. 页面名称：create.php
 3. 作者：tangxuyang@lifang.com
*/
?>
<!doctype html>
<html>
    <?php
        require_once('../global.php');
    ?>
<head>
    <meta charset="utf-8">
    <title>活动生成</title>
    <link rel="stylesheet" href="<?php echo $STATIC_DOMAIN?>/fe_public_library/bootstrap/3.3.4/css/bootstrap.min.css" />
    <style type="text/css">
        .javascripts{
            min-height:2.6em;
        }

        .stylesheets{
            min-height:2.6em;
        }
    </style>
</head>

<body>
    <?php
        //读取数据        
        $activity_name = isset($_POST["activity_name"])?$_POST["activity_name"]:"";
        $page_title = isset($_POST["page_title"])?$_POST["page_title"]:"";
        $page_description= isset($_POST["page_description"])?$_POST["page_description"]:"";
        $page_keywords= isset($_POST["page_keywords"])?$_POST["page_keywords"]:"";
        $estate_Id= isset($_POST["estate_Id"])?$_POST["estate_Id"]:"";
        $estate_name= isset($_POST["estate_name"])?$_POST["estate_name"]:"";
        $include_reserve= isset($_POST["include_reserve"]) ? $_POST["include_reserve"] : false;
        $match_css=isset($_POST["match_css"])?$_POST["match_css"]:false;
        $match_js=isset($_POST["match_js"])?$_POST["match_js"]:false;
        $wechat_share=isset($_POST["wechat_share"])?$_POST["wechat_share"]:false;
        $wechat_title= isset($_POST["wechat_title"])?$_POST["wechat_title"]:"";
        $wechat_content= isset($_POST["wechat_content"])?$_POST["wechat_content"]:"";
        $extra_stylesheets = isset($_POST["extra_stylesheets"])?$_POST["extra_stylesheets"]:array();
        $extra_javascripts = isset($_POST["extra_javascripts"])?$_POST["extra_javascripts"]:array();
        $hotline = isset($_POST["hotline"])?$_POST["hotline"]:"";
        $hotline_subnum = isset($_POST["hotline_subnum"])?$_POST["hotline_subnum"]:"";

        $error_array = array();

        if(isset($_POST['submit']))
        {
            //验证数据
            if(empty($activity_name)){
                array_push($error_array,"活动名为空");
            } elseif(is_dir($activity_name)){
                array_push($error_array,"活动已存在");
            }

            if(empty($estate_Id)){
                array_push($error_array,"房产Id为空");
            }

            if(empty($estate_name)){
                array_push($error_array,"房产名称为空");
            }

            if($wechat_share){
                if(empty($wechat_title)){
                    array_push($error_array,"微信分享标题为空");
                }
                if(empty($wechat_content)){
                    array_push($error_array,"微信分享内容为空");
                }
            }

            //生成目录结构
            if(count($error_array)==0){//无错误，生成目录结构
                if(mkdir("../$activity_name") && mkdir("../$activity_name/less") && mkdir("../$activity_name/images") && 
                    mkdir("../$activity_name/jssrc") && mkdir("../$activity_name/images/web") && mkdir("../$activity_name/images/wap")){                        
                        //生成config.php
                        require_once('createconfig.php');

                        //生成web.php
                        require_once('createweb.php');
                        
                        //生成wap.php
                        require_once('createwap.php');

                        require_once('createextraresources.php');               

                        echo '<div class="alert alert-success"><h1 class="text-center">生成成功<small><a href="">返回</a></small></h1></div></body></html>';
                        exit;
                }else{
                    array_push($error_array,"创建活动目录失败");
                }
            }        
        }        
    ?>
    
    <div class="container" style="margin-top:20px" >    
        <?php
            //输出错误信息
            if(count($error_array)>0){
        ?>
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    <?php
                        for($i = 0; $i < count($error_array); $i++){
                    ?>
                        <li><?php echo $error_array[$i]?></li>
                    <?php

                        }
                    ?>
                </ul>
            </div>
        <?php
            }
        ?>    

        <!--活动元数据表单-->
        <form class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <caption>
                <h2 class="text-center">活动生成</h2>
            </caption>
            <!--活动名称即活动目录名称-->
        	<div class="form-group">
                <label class="control-label" for="activity_name">活动目录(建议英文)</label>
                <input type="text" class="form-control" id="activity_name" name="activity_name" value="<?php echo $activity_name?>"/>
            </div>
            <!--页面标题-->
            <div class="form-group">
                <label class="control-label" for="page_title">页面标题(head->title)</label>
                <input type="text" class="form-control" id="page_title" name="page_title" value="<?php echo $page_title?>" />
            </div>
            <!--页面描述-->
            <div class="form-group">
                <label class="control-label" for="page_description">页面描述(head->description)</label>
                <textarea class="form-control" cols="20" id="page_description" name="page_description" value="<?php echo $page_description?>"></textarea>
            </div>
            <!--页面关键字-->
            <div class="form-group">
                <label class="control-label" for="page_keywords">页面关键字(head->keywords)</label>
                <input type="text" class="form-control" id="page_keywords" name="page_keywords" value="<?php echo $page_keywords?>" />
            </div>
            <!--房产ID-->
            <div class="form-group">
                <label class="control-label" for="estate_Id">房产ID</label>
                <input type="text" class="form-control" id="estate_Id" name="estate_Id" value="<?php echo $estate_Id?>"/>
            </div>
            <!--房产名称-->
            <div class="form-group">
                <label class="control-label" for="estate_name">房产名称</label>
                <input type="text" class="form-control" id="estate_name" name="estate_name" value="<?php echo $estate_name?>"/>
            </div>
            <!--预约热线，包括总机和分级-->
            <div class="form-group">
                <label class="control-label" for="hotline">预约热线</label>
                <div class="input-group">
                    
                    <input type="text" class="form-control" id="hotline" name="hotline" value="<?php echo $hotline?>"/>
                    <span class="input-group-addon">
                    -
                    </span>
                    <span class="input-group-addon" style="width:30%;padding:0;border:0">
                        <input type="text" class="form-control" id="hotline_subnum" name="hotline_subnum" value="<?php echo $hotline_subnum?>" style="border:0" placeholder="分机号码" />
                    </span>        
                </div>                
            </div>            
            
            <!--包含预约、匹配路由样式、匹配路由脚本-->
            <div class="form-group">
                <div class="row">
            		<label class="col-xs-4">
                        <input type="checkbox" name="include_reserve" <?php echo $include_reserve? "checked":""?> /> 包含预约
                    </label> 
					<label class="col-xs-4">
						<input type="checkbox" name="match_css" <?php echo $match_css?"checked":""?> /> 匹配路由样式表
					</label>

					<label class="col-xs-4">
						<input type="checkbox" name="match_js" <?php echo $match_js?"checked":""?>/> 匹配路由脚本
					</label>
					</div>
			</div>

            <!--微信分享-->
			<div class="form-group">
	            <div class="panel panel-default">
	            	<div class="form-group">                
		                <label>
		                    <input type="checkbox" name="wechat_share" <?php echo $wechat_share?"checked":""?> /> 微信分享
		                </label>
	            	</div>	            	
	            	<div class="form-group">
    	                <label class="control-label">微信分享标题</label>
    	                <input type="text" class="form-control" name="wechat_title" value="<?php echo $wechat_title?>" />
	               </div>
	               <div class="form-group">
    	                <label class="control-label">微信分享内容</label>
    	                <textarea type="text" class="form-control" name="wechat_content" value="<?php echo $wechat_content?>"></textarea>
	               </div>
	            </div>
            </div>

            
            <!--额外样式表列表-->
            <div class="form-group">
                <label class="control-label" for="extra_stylesheet">额外样式表</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="extra_stylesheet">
                    <span class="input-group-btn">
    					<button class="btn btn-primary addcss" type="button">添加</button>
    				</span>
                </div>
            </div>
            <div class="panel panel-default stylesheets">
                <ul class="list-group"> 
                <?php
                    foreach($extra_stylesheets as $css){
                ?>
                        <li class="list-group-item"><?php echo $css?> <span class="glyphicon glyphicon-remove"></span><input type="hidden" name="extra_stylesheets[]" value="<?php echo $css?>"/></li>
                <?php
                    }
                ?>                      
				</ul>
				</div>

				<!--额外脚本列表 -->
				<div class="form-group">
					<label class="control-label" for="extra_javascript">额外脚本</label>
					<div class="input-group">    					
    					<input type="text" class="form-control" id="extra_javascript">
    					<span class="input-group-btn">
    						<button class="btn btn-primary addjs" type="button">添加</button>
    					</span>
            		</div>
    			</div>
                <div class="panel panel-default javascripts">
                    <ul class="list-group">   
                        <?php
                            foreach($extra_javascripts as $js){
                        ?>
                            <li class="list-group-item"><?php echo $js?> <span class="glyphicon glyphicon-remove"></span><input type="hidden" name="extra_javascripts[]" value="<?php echo $js?>"/></li>
                        <?php
                            }
                        ?>                     
					</ul>
				</div>

				<div class="form-group text-center">
    				<button type="submit" name="submit" class="btn">生 成</button>
    				<button type="reset" class="btn">重 置</button>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="../public/jssrc/jquery-1.11.3.js">
		</script>
		<script type="text/javascript" src="<?php echo $STATIC_DOMAIN?>/fe_public_library/bootstrap/3.3.4/js/bootstrap.min.js">
		</script>
        <script type="text/javascript" src="create.js">        
        </script>
	</body>
</html>