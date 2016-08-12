<?php	

	$str = var_export($_POST,true);
	$configStr = <<<comments
	<?php 
		/*
			activityName:活动名称（用来生成活动目录的）
			pageTitle:页面head->title
			pageDescription:页面head->description
			pageKeywords:页面head->keywords
			wechatShare:是否微信分享
			wechatTitle:微信分享的标题
			wechatContent:微信分享的内容
			sections:[//楼盘信息是分节的
				{
					name:section的名字
					webLink:web版本的查看更多的链接
					wapLink:wap版本的查看更多的链接
					estates:[//本节包含的楼盘
						{
							estateId:楼盘的id
							estateName:楼盘的名称
							webLink:web版楼盘的链接
							wapLink:wap版楼盘的链接
							price:楼盘的价钱
							webImg:web版的图片
							wapImg:wap版的图片
							hotline:热线
							hotlineSubNum:分机号
						}
					]
				}

			]

		*/
	?>
	<?php
	require_once('../public/global.php');
	\$config = $str;
	?>
comments;
	file_put_contents("../$activityName/config.php", $configStr);	
?>