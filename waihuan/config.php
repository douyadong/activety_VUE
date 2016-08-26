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
  'activityName' => 'waihuan',
  'pageTitle' => '悟空找房推荐上海外环楼盘_郊区新房楼盘专题',
  'pageDescription' => '上海悟空找房为您推荐上海外环外新房楼盘,地铁沿线楼盘,外环学区房,升值空间大,地铁规划区域楼盘,地处优势配套齐全,房价低至11000起,上海悟空找房推荐郊区新房楼盘,买外环新房就上悟空找房',
  'pagekeywords' => '外环新房,上海郊区楼盘,外环地铁房,郊区新房,地铁规划楼盘,上海悟空找房',
  'wechatShare' => 'true',
  'wechatTitle' => '外环，您的另一个绝佳选择',
  'wechatContent' => '外环地铁沿线、物超所值、配套齐全的楼盘推荐',
  'matchJs' => 'false',
  'matchCss' => 'true',
  'includeReserve' => 'true',
  'sections' => 
  array (
    0 => 
    array (
      'name' => '地铁沿线',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist',
      'wapLink' => 'http://www.wkzf.com/shanghai/xflist',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '107277',
          'estateName' => '旭辉铂悦西郊',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/3e307a0f96fe7315.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/3e307a0f96fe7315.html',
          'price' => '57000',
          'webImg' => '旭辉铂悦西郊.jpg',
          'wapImg' => '旭辉铂悦西郊.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6177',
        ),
        1 => 
        array (
          'estateId' => '123534',
          'estateName' => '绿地海域观园',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/f150b98a65ed3401.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/f150b98a65ed3401.html',
          'price' => '40000',
          'webImg' => '绿地海域观园.jpg',
          'wapImg' => '绿地海域观园.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6178',
        ),
        2 => 
        array (
          'estateId' => '143613',
          'estateName' => '保利翡丽公馆',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/871576eac990aedc.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/871576eac990aedc.html',
          'price' => '36000',
          'webImg' => '保利翡丽公馆.jpg',
          'wapImg' => '保利翡丽公馆.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6179',
        ),
        3 => 
        array (
          'estateId' => '147226',
          'estateName' => '御上海青橙',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/8fce56db22e3888e.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/8fce56db22e3888e.html',
          'price' => '23000',
          'webImg' => '御上海青橙.jpg',
          'wapImg' => '御上海青橙.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6180',
        ),
      ),
    ),
    1 => 
    array (
      'name' => '物超所值',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist',
      'wapLink' => 'http://www.wkzf.com/shanghai/xflist',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '145069',
          'estateName' => '光明D9空间',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/bed3badf1f11fb31.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/bed3badf1f11fb31.html',
          'price' => '20000',
          'webImg' => '光明D9空间.jpg',
          'wapImg' => '光明D9空间.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6181',
        ),
        1 => 
        array (
          'estateId' => '147174',
          'estateName' => '合景理想家',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/5456907437c18468.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/5456907437c18468.html',
          'price' => '17000',
          'webImg' => '合景理想家.jpg',
          'wapImg' => '合景理想家.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6182',
        ),
        2 => 
        array (
          'estateId' => '144196',
          'estateName' => '珠江国际中心悦公馆',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/ae72e0df1e8ee5b4.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/ae72e0df1e8ee5b4.html',
          'price' => '20000',
          'webImg' => '珠江国际中心悦公馆.jpg',
          'wapImg' => '珠江国际中心悦公馆.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6183',
        ),
        3 => 
        array (
          'estateId' => '123101',
          'estateName' => '华纺和成未来派',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/1e0aae0a5391f201.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/1e0aae0a5391f201.html',
          'price' => '11000',
          'webImg' => '华纺和成未来派.jpg',
          'wapImg' => '华纺和成未来派.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6184',
        ),
      ),
    ),
    2 => 
    array (
      'name' => '配套齐全',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist',
      'wapLink' => 'http://www.wkzf.com/shanghai/xflist',
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
          'hotlineSubNum' => '6185',
        ),
        1 => 
        array (
          'estateId' => '143628',
          'estateName' => '东方豪园',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/d10c6649c9c8e22d.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/d10c6649c9c8e22d.html',
          'price' => '30000',
          'webImg' => '东方豪园.jpg',
          'wapImg' => '东方豪园.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6186',
        ),
        2 => 
        array (
          'estateId' => '107290',
          'estateName' => '中展瑞景',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/c5dc01550d67dc39.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/c5dc01550d67dc39.html',
          'price' => '23000',
          'webImg' => '中展瑞景.jpg',
          'wapImg' => '中展瑞景.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6187',
        ),
        3 => 
        array (
          'estateId' => '144232',
          'estateName' => '三迪曼哈顿',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/4356da8d749260f9.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/4356da8d749260f9.html',
          'price' => '20000',
          'webImg' => '三迪曼哈顿.jpg',
          'wapImg' => '三迪曼哈顿.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6188',
        ),
      ),
    ),
  ),
  'estateLayout' => '2',
);
	?>