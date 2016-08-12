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
  'activityName' => 'sxkhpmel',
  'pageTitle' => '悟空找房精选商铺_年中好铺盘点_悟空找房推荐',
  'pageDescription' => '悟空找房推荐商铺专题,商铺投资就上悟空找房,商住两用房低至6500元一平,上海商铺以及上海周边商铺投资,六大有潜力商铺项目,六大商住两用房项目供君选择。',
  'pagekeywords' => '商铺投资,商住两用房,上海商铺,上海周边商铺,店面投资,悟空找房',
  'wechatShare' => 'true',
  'wechatTitle' => '盛夏狂欢，“铺”面而来',
  'wechatContent' => '年中好铺大盘点 热火商住项目',
  'matchJs' => 'false',
  'matchCss' => 'false',
  'includeReserve' => 'true',
  'sections' => 
  array (
    0 => 
    array (
      'name' => '好“铺”袭来',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/t3',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/3',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '147345',
          'estateName' => '旭辉恒基',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/05aa2b92a11d7c64.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/05aa2b92a11d7c64.html',
          'price' => '35000',
          'webImg' => '旭辉恒基.jpg',
          'wapImg' => '旭辉恒基.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9845',
        ),
        1 => 
        array (
          'estateId' => '122639',
          'estateName' => '新华红星国际广场',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/cb885122b4264059.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/cb885122b4264059.html',
          'price' => '60000',
          'webImg' => '新华红星.jpg',
          'wapImg' => '新华红星.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '8117',
        ),
        2 => 
        array (
          'estateId' => '145279',
          'estateName' => '虹桥正荣中心',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/3befc4892598b557.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/3befc4892598b557.html',
          'price' => '40000',
          'webImg' => '虹桥正荣.jpg',
          'wapImg' => '虹桥正荣.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9150',
        ),
        3 => 
        array (
          'estateId' => '136458',
          'estateName' => '中童巴比尼',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/36cc14af4fddfacc.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/36cc14af4fddfacc.html',
          'price' => '25000',
          'webImg' => '中童巴比尼.jpg',
          'wapImg' => '中童巴比尼.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '8081',
        ),
        4 => 
        array (
          'estateId' => '119348',
          'estateName' => '大融城商业广场',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/82664233612eec26.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/82664233612eec26.html',
          'price' => '40000',
          'webImg' => '大融城.jpg',
          'wapImg' => '大融城.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9122',
        ),
        5 => 
        array (
          'estateId' => '145758',
          'estateName' => '红太阳商业广场',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/a4a712eb5015d323.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/a4a712eb5015d323.html',
          'price' => '60000',
          'webImg' => '红太阳.jpg',
          'wapImg' => '红太阳.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9201',
        ),
      ),
    ),
    1 => 
    array (
      'name' => '“商住”跟上',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/t3',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/3',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '106763',
          'estateName' => '嘉隆国际 （商住）',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/9dba792040787f61.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/9dba792040787f61.html',
          'price' => '16000',
          'webImg' => '嘉隆国际.jpg',
          'wapImg' => '嘉隆国际.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '8150',
        ),
        1 => 
        array (
          'estateId' => '145069',
          'estateName' => '光明D9空间 （商住）',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/bed3badf1f11fb31.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/bed3badf1f11fb31.html',
          'price' => '20000',
          'webImg' => '光明D9空间.jpg',
          'wapImg' => '光明D9空间.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9114',
        ),
        2 => 
        array (
          'estateId' => '153100',
          'estateName' => '智富城Mimon公寓（商住）',
          'webLink' => 'http://www.wkzf.com/jiaxing/xfdetail/e6c0e863044c5948.html',
          'wapLink' => 'http://m.wkzf.com/jiaxing/xfdetail/e6c0e863044c5948.html',
          'price' => '6500',
          'webImg' => '智富城.jpg',
          'wapImg' => '智富城.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9488',
        ),
        3 => 
        array (
          'estateId' => '106899',
          'estateName' => '宝山卓越时代广场 （商住）',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/00c129bcb09b05ef.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/00c129bcb09b05ef.html',
          'price' => '25000',
          'webImg' => '宝山卓越.jpg',
          'wapImg' => '宝山卓越.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '8148',
        ),
        4 => 
        array (
          'estateId' => '147181',
          'estateName' => '乐都新界商业广场（商住）',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/90c8b908f452874e.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/90c8b908f452874e.html',
          'price' => '22000',
          'webImg' => '乐都新界.jpg',
          'wapImg' => '乐都新界.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '9715',
        ),
        5 => 
        array (
          'estateId' => '122837',
          'estateName' => '一品国际 （商住）',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/f9be9680891a2c61.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/f9be9680891a2c61.html',
          'price' => '66000',
          'webImg' => '一品国际.jpg',
          'wapImg' => '一品国际.jpg',
          'hotline' => '4009230626',
          'hotlineSubNum' => '8149',
        ),
      ),
    ),
  ),
  'estateLayout' => '3',
);
	?>