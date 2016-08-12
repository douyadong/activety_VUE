<?php
/*
 1. 项目名称：活动列表生成页面
 2. 页面名称：activitylist->create.php
 3. 作者：tangxuyang@lifang.com
*/
?>
<!doctype html>
<html>
    <?php
        require_once('../public/global.php');
    ?>
<head>
    <meta charset="utf-8">
    <title>楼盘列表活动生成</title>
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
    <div class="container" style="margin-top:20px" >            
        <!--活动元数据表单-->
        <form class="form">
            <caption>
                <h2 class="text-center">楼盘列表活动生成</h2>
            </caption>
            <!--活动名称即活动目录名称-->
        	<div class="form-group">
                <label class="control-label" for="activityName">活动目录(建议英文)</label>
                <input type="text" class="form-control" id="activityName" />
            </div>
            <!--页面标题-->
            <div class="form-group">
                <label class="control-label" for="pageTitle">页面标题(head->title)</label>
                <input type="text" class="form-control" id="pageTitle" />
            </div>
            <!--页面描述-->
            <div class="form-group">
                <label class="control-label" for="pageDescription">页面描述(head->description)</label>
                <textarea class="form-control" cols="20" id="pageDescription"></textarea>
            </div>
            <!--页面关键字-->
            <div class="form-group">
                <label class="control-label" for="pageKeywords">页面关键字(head->keywords)</label>
                <input type="text" class="form-control" id="pageKeywords" />
            </div> 
            <!--两栏或三栏-->
            <div class="form-group">
                <label class="control-label" for="estateLayout">楼盘显示布局</label>
                <select class="form-control" id="estateLayout" name="estateLayout">
                    <option value="2">--两栏--</option>
                    <option value="3">--三栏--</option>
                </select>                
            </div>            
            <!--微信分享-->
			<div class="form-group">
	            <div class="panel panel-default">
	            	<div class="form-group">                
		                <label>
		                    <input type="checkbox" id="wechatShare" /> 微信分享
		                </label>
	            	</div>	            	
	            	<div class="form-group">
    	                <label class="control-label">微信分享标题</label>
    	                <input type="text" class="form-control" id="wechatTitle" />
	               </div>
	               <div class="form-group">
    	                <label class="control-label">微信分享内容</label>
    	                <textarea type="text" class="form-control" id="wechatContent"></textarea> 
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
                    </ul>
                </div>
            
                        <div class="form-group">
                    <div class="row">
                        <label class="col-xs-4">
                            <input type="checkbox" id="includeReserve" /> 包含预约
                        </label> 
                        <label class="col-xs-4">
                            <input type="checkbox" id="matchCss" /> 匹配路由样式表
                        </label>

                        <label class="col-xs-4">
                            <input type="checkbox" id="matchJs" /> 匹配路由脚本
                        </label>
                        </div>
                </div>
            
            <h3 class="h3">Sections</h3>
            <div class="row" style="margin-bottom:10px">                
                <div class="col-xs-4"><input type="text" class="form-control" placeholder="section名称" id="sectionName" /></div>
                <div class="col-xs-3"><input type="text" class="form-control" placeholder="web版链接" id="sectionWebLink" /></div>
                <div class="col-xs-3"><input type="text" class="form-control" placeholder="wap版链接" id="sectionWapLink" /></div>
                <div class="col-xs-2"><a href="javascript:;" class="btn btn-primary" id="addSectionBtn">新增</a></div>
            </div>            
            <div id="sections" style="margin-bottom:20px">                
                
            </div>
            <div class="well hide section" id="sectionTemplate">
                <h4><span class="section-name"></span> &nbsp;&nbsp;&nbsp;<span class="section-web-link"></span> &nbsp;&nbsp;&nbsp;<span class="section-wap-link"></span><small> &nbsp;&nbsp;&nbsp;<a href="javascript:;" class="delete-section">删除</a></small><a href="javascript:;" class="close collapse-section">-</a></h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>房产Id</th>
                            <th>房产名</th>
                            <th>web链接</th>
                            <th>wap链接</th>
                            <th>价格</th>
                            <th>web图片</th>
                            <th>wap图片</th>
                            <th>热线-分机</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                    <tfoot></tfoot>
                </table>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">房产ID</label>
                            <input type="text" class="form-control estate-Id" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">房产名称</label>
                            <input type="text" class="form-control estate-name" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">web链接</label>
                            <input type="text" class="form-control web-link" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">wap链接</label>
                            <input type="text" class="form-control wap-link" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">web图片</label>
                            <input type="text" class="form-control web-img" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label">wap图片</label>
                            <input type="text" class="form-control wap-img" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label class="control-label">预约热线</label>
                            <div class="input-group">
                                <input type="text" class="form-control hotline" />
                                <span class="input-group-addon">
                                -
                                </span>
                                <span class="input-group-addon" style="width:30%;padding:0;border:0">
                                    <input type="text" class="form-control hotline-subnum" style="border:0" placeholder="分机号码" />
                                </span>        
                            </div>                
                        </div> 
                    </div>  
                    <div class="col-xs-4">
                        <label class="control-label">价格</label>
                        <input type="text" class="form-control price"/>
                    </div>                  
                </div>
                <div class="row text-right">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-primary add-btn">添加</button>
                    </div>
                </div>
            </div>
                
			<div class="form-group text-center">
				<button type="button" id="createBtn" class="btn btn-primary">生 成</button>
				<button type="reset" class="btn">重 置</button>
			</div>
			</form>
		</div>
		<script type="text/javascript" src="../../public/jssrc/jquery-1.11.3.js">
		</script>
		<script type="text/javascript" src="<?php echo $STATIC_DOMAIN?>/fe_public_library/bootstrap/3.3.4/js/bootstrap.min.js">
		</script>
        <script type="text/javascript" src="create.js">        
        </script>
	</body>
</html>