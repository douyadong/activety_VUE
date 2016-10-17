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
	$config = array (
  'activityName' => 'tianmihunfangji',
  'pageTitle' => '甜蜜婚房季_悟空找房_爱TA就给TA一个家',
  'pageDescription' => '甜蜜婚房季,上海悟空找房为您推荐婚房楼盘,奢华大气型楼盘,上海市区海景房均价110000起,另有经济适用房,升值潜力高楼盘,均价35000,还有上海周边楼盘,新婚夫妻拎包入住,均价低至5500起,甜蜜婚房 季,婚房楼盘活动多多,尽在悟空找房',
  'pagekeywords' => '婚房,经济适用房,上海新房,上海周边新房,海景房,上海新楼盘',
  'wechatShare' => 'true',
  'wechatTitle' => '爱TA就给TA一个家，悟空帮你找婚房',
  'wechatContent' => '结婚黄金季  甜蜜婚房季 不同阶层 不同品味 悟空 推荐 婚房 奢华大气型 经济实惠型 周边浪漫型',
  'matchJs' => 'false',
  'matchCss' => 'false',
  'includeReserve' => 'true',
  'sections' => 
  array (
    0 => 
    array (
      'name' => '奢华大气型',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/p9 ',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/p9',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '18174',
          'estateName' => '静安豪景苑',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/577e73fc4cdd6d01.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/577e73fc4cdd6d01.html',
          'price' => '110000',
          'webImg' => '静安豪景苑.jpg',
          'wapImg' => '静安豪景苑.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10411',
        ),
        1 => 
        array (
          'estateId' => '144167',
          'estateName' => '华润外滩九里',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/d6f9c23ee3df4f0b.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/d6f9c23ee3df4f0b.html',
          'price' => '120000 ',
          'webImg' => '华润外滩九里.jpg',
          'wapImg' => '华润外滩九里.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10397',
        ),
        2 => 
        array (
          'estateId' => '144200',
          'estateName' => '复兴珑御',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/d56bb43b5638a0ac.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/d56bb43b5638a0ac.html',
          'price' => '120000 ',
          'webImg' => '复兴珑御.jpg',
          'wapImg' => '复兴珑御.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10398',
        ),
        3 => 
        array (
          'estateId' => '143723',
          'estateName' => '中粮天悦壹号',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/5e9a2feefe98b16a.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/5e9a2feefe98b16a.html',
          'price' => '110000',
          'webImg' => '中粮天悦壹号.jpg',
          'wapImg' => '中粮天悦壹号.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10036',
        ),
      ),
    ),
    1 => 
    array (
      'name' => '经济实惠型',
      'webLink' => ' http://www.wkzf.com/shanghai/xflist/p6',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/p6',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '136522',
          'estateName' => '安高东方御府',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/610f233457cb29f7.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/610f233457cb29f7.html',
          'price' => '34000',
          'webImg' => '安高东方御府.jpg',
          'wapImg' => '安高东方御府.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10196',
        ),
        1 => 
        array (
          'estateId' => '106408',
          'estateName' => '鑫苑壹品世家',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/f3ee809d5106a1a3.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/f3ee809d5106a1a3.html',
          'price' => '31000',
          'webImg' => '鑫苑壹品世家.jpg',
          'wapImg' => '鑫苑壹品世家.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10330',
        ),
        2 => 
        array (
          'estateId' => '144148',
          'estateName' => '大发融悦',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/4cb041c269da5b6a.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/4cb041c269da5b6a.html',
          'price' => '33000',
          'webImg' => '大发融悦.jpg',
          'wapImg' => '大发融悦.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10338',
        ),
        3 => 
        array (
          'estateId' => '143994',
          'estateName' => '葛洲坝绿城·玉兰花园',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/578389bd12167bd2.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/578389bd12167bd2.html',
          'price' => '36000',
          'webImg' => '葛洲坝绿城·玉兰花园.jpg',
          'wapImg' => '葛洲坝绿城·玉兰花园.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10337',
        ),
      ),
    ),
    2 => 
    array (
      'name' => '周边浪漫型',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/p2',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/p2',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '117232',
          'estateName' => '塞纳蓝湾',
          'webLink' => 'http://www.wkzf.com/jiaxing/xfdetail/2ddb7db8416c621a.html	',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/37b33533cae1033e.html',
          'price' => '8500',
          'webImg' => '塞纳蓝湾.jpg',
          'wapImg' => '塞纳蓝湾.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12545',
        ),
        1 => 
        array (
          'estateId' => '119634',
          'estateName' => '新西塘孔雀城',
          'webLink' => 'http://www.wkzf.com/jiaxing/xfdetail/30c384e0e95add7f.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/c0e1f04866474879.html',
          'price' => '8000',
          'webImg' => '新西塘孔雀城.jpg',
          'wapImg' => '新西塘孔雀城.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12550',
        ),
        2 => 
        array (
          'estateId' => '144546',
          'estateName' => '新城郡尚海',
          'webLink' => 'http://www.wkzf.com/suzhou/xfdetail/9e5e4da644effcf5.html',
          'wapLink' => 'http://m.wkzf.com/suzhou/xfdetail/9e5e4da644effcf5.html',
          'price' => '18000',
          'webImg' => '新城郡尚海.jpg',
          'wapImg' => '新城郡尚海.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10830',
        ),
        3 => 
        array (
          'estateId' => '144937',
          'estateName' => '奥园黄金海岸',
          'webLink' => 'http://www.wkzf.com/jiaxing/xfdetail/9bf17f9b1d121f54.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/47fe223979b010ec.html',
          'price' => '5500',
          'webImg' => '奥园黄金海岸.jpg',
          'wapImg' => '奥园黄金海岸.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12548',
        ),
      ),
    ),
  ),
  'estateLayout' => '2',
);
	?>