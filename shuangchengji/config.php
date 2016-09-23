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
  'activityName' => 'shuangchengji',
  'pageTitle' => '双城记_悟空找房_上海周边楼盘',
  'pageDescription' => '上海周边楼盘,上海悟空找房为您推荐嘉兴楼盘,热销楼盘,低总价,地势优，景观住宅，养生住宅，上海周边楼盘尽在悟空找房',
  'pageKeywords' => '上海楼盘,嘉兴楼盘,低总价,上海周边楼盘',
  'wechatShare' => 'true',
  'wechatTitle' => '双城记 上海 嘉兴 上海周边楼盘 双城热销 低总价 地势优 景观住宅 养生地产',
  'wechatContent' => '双城记 上海周边楼盘 嘉兴 悟空 推荐 双城热销 低总价 地势优 景观住宅 养生地',
  'matchJs' => 'false',
  'matchCss' => 'true',
  'includeReserve' => 'true',
  'sections' => 
  array (
    0 => 
    array (
      'name' => '上海和嘉兴',
      'webLink' => '',
      'wapLink' => '',
      'estates' => 
      array(
        0 => array(
          'estateId' => '',
          'estateName' => '',
          'webLink' => 'javascript:;',
          'wapLink' => '',
          'price' => '',
          'webImg' => '上海和嘉兴.jpg',
          'wapImg' => '上海和嘉兴.jpg',
          'hotline' => '',
          'hotlineSubNum' => '',
          )

        )
    ),
    1 => 
    array (
      'name' => '[双城] 热销',
      'webLink' => ' http://www.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '153191',
          'estateName' => '新西塘孔雀城',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/c0e1f04866474879.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/c0e1f04866474879.html',
          'price' => '12000',
          'webImg' => '新西塘孔雀城.jpg',
          'wapImg' => '新西塘孔雀城.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6245',
        ),
        1 => 
        array (
          'estateId' => '153100',
          'estateName' => '智富城Mimon公寓',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/65061edd0af64dd7.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/65061edd0af64dd7.html',
          'price' => '6500',
          'webImg' => '智富城Mimon公寓.jpg',
          'wapImg' => '智富城Mimon公寓.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6246',
        ),
        2 => 
        array (
          'estateId' => '155079',
          'estateName' => '四季香榭',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/0b64da93d4a7e7de.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/0b64da93d4a7e7de.html',
          'price' => '8500',
          'webImg' => '四季香榭.jpg',
          'wapImg' => '四季香榭.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6320',
        ),
        3 => 
        array (
          'estateId' => '155715',
          'estateName' => '名城花苑',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/949476d3b6f66d34.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/949476d3b6f66d34.html',
          'price' => '7000',
          'webImg' => '名城花苑.jpg',
          'wapImg' => '名城花苑.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6321',
        )
      ),
    ),
    2 => 
    array (
      'name' => '低总价·地势优',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '153174',
          'estateName' => '奥园黄金海岸',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/47fe223979b010ec.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/47fe223979b010ec.html',
          'price' => '5500',
          'webImg' => '奥园黄金海岸.jpg',
          'wapImg' => '奥园黄金海岸.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6247',
        ),
        1 => 
        array (
          'estateId' => '153182',
          'estateName' => '万联城',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/80addcfac297068b.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/80addcfac297068b.html',
          'price' => '6500',
          'webImg' => '万联城.jpg',
          'wapImg' => '万联城.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6248',
        ),
        2 => 
        array (
          'estateId' => '155706',
          'estateName' => '嘉兴万达广场',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/3ab567a2f1c64d66.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/3ab567a2f1c64d66.html',
          'price' => '8000',
          'webImg' => '嘉兴万达广场.jpg',
          'wapImg' => '嘉兴万达广场.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6322',
        ),
        3 => 
        array (
          'estateId' => '155623',
          'estateName' => '嘉兴尚海年华',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/f2311b7eeb1c8667.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/f2311b7eeb1c8667.html',
          'price' => '6500',
          'webImg' => '嘉兴尚海年华.jpg',
          'wapImg' => '嘉兴尚海年华.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6323',
        ),
      ),
    ),
    3 => 
    array (
      'name' => '景观住宅·养生地产',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist/shanghaizhoubian/',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '153095',
          'estateName' => '塞纳蓝湾',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/37b33533cae1033e.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/37b33533cae1033e.html',
          'price' => '8500',
          'webImg' => '塞纳蓝湾.jpg',
          'wapImg' => '塞纳蓝湾.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6249',
        ),
        1 => 
        array (
          'estateId' => '153101',
          'estateName' => '保利西塘越',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/382da159d75ae02c.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/382da159d75ae02c.html',
          'price' => '7500',
          'webImg' => '保利西塘越.jpg',
          'wapImg' => '保利西塘越.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '6250',
        ),
      ),
    ),
    4 => 
    array (
      'name' => '更多热点专题推荐',
      'webLink' => '',
      'wapLink' => '',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '',
          'estateName' => '外环专题',
          'webLink' => 'http://hd.wkzf.com/waihuan/web.html',
          'wapLink' => '	 http://hd.wkzf.com/waihuan/wap.html',
          'price' => '',
          'webImg' => '外环专题.jpg',
          'wapImg' => '外环专题.jpg',
          'hotline' => '',
          'hotlineSubNum' => '',
        ),
        1 => 
        array (
          'estateId' => '',
          'estateName' => '商铺专题',
          'webLink' => 'http://hd.wkzf.com/sxkhpmel/web.html',
          'wapLink' => 'http://hd.wkzf.com/sxkhpmel/wap.html',
          'price' => '',
          'webImg' => '商铺专题.jpg',
          'wapImg' => '商铺专题.jpg',
          'hotline' => '',
          'hotlineSubNum' => '',
        ),
        2 => 
        array (
          'estateId' => '',
          'estateName' => '甜蜜婚房专题',
          'webLink' => 'http://hd.wkzf.com/tianmihunfangji/web.html',
          'wapLink' => 'http://hd.wkzf.com/tianmihunfangji/wap.html',
          'price' => '',
          'webImg' => '甜蜜婚房专题.jpg',
          'wapImg' => '甜蜜婚房专题.jpg',
          'hotline' => '',
          'hotlineSubNum' => '',
        ),
      ),
    ),
  ),
  'estateLayout' => '2',
);
	?>