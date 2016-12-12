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
  'activityName' => 'zhengnengliang',
  'pageTitle' => '新政热门楼盘集锦_悟空找房江浙沪热盘推荐',
  'pageDescription' => '新政前后重点楼盘集锦页,悟空找房精心挑选一批位于江浙沪的各大热门楼盘,总有一套适合你,别墅,学区房,轨交房,商铺,各种类型楼盘任您选择,详情直接致电悟空找房',
  'pageKeywords' => '苏州新房,宁波新房,嘉兴新房,杭州新房,上海新房,南通新房',
  'wechatShare' => 'true',
  'wechatTitle' => '政能量 新政之下上海客户都在搜索什么样的房子？',
  'wechatContent' => '政能量 上海嘉兴南通宁波  商住来袭  热盘领跑  精品力荐',
  'matchJs' => 'false',
  'matchCss' => 'true',
  'includeReserve' => 'true',
  'sections' => 
  array (
    0 => 
    array (
      'name' => '盘点',
      'webLink' => '',
      'wapLink' => '',
      'estates' => 
      array(
        0 => array(
          'estateId' => '',
          'estateName' => '',
          'webLink' => 'javascript:;',
          'wapLink' => 'javascript:;',
          'price' => '',
          'webImg' => '盘点.jpg',
          'wapImg' => '盘点.jpg',
          'hotline' => '',
          'hotlineSubNum' => '',
          )

        )
    ),
    1 => 
    array (
      'name' => '商住×来袭',
      'webLink' => 'http://www.wkzf.com/shanghai/xflist',
      'wapLink' => 'http://m.wkzf.com/shanghai/xflist',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '146967',
          'estateName' => '智富城Mimon公寓',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/65061edd0af64dd7.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/65061edd0af64dd7.html',
          'price' => '7300',
          'webImg' => '智富城Mimon公寓.jpg',
          'wapImg' => '智富城Mimon公寓.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12061',
        ),
        1 => 
        array (
          'estateId' => '144993',
          'estateName' => '中富御湖湾',
          'webLink' => 'http://www.wkzf.com/suzhou/xfdetail/90e5ba62e15186b6.html',
          'wapLink' => 'http://m.wkzf.com/suzhou/xfdetail/90e5ba62e15186b6.html',
          'price' => '14000',
          'webImg' => '中富御湖湾.jpg',
          'wapImg' => '中富御湖湾.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10798',
        ),
        2 => 
        array (
          'estateId' => '145279',
          'estateName' => '虹桥正荣中心',
          'webLink' => 'http://www.wkzf.com/shanghai/xfdetail/3befc4892598b557.html',
          'wapLink' => 'http://m.wkzf.com/shanghai/xfdetail/3befc4892598b557.html',
          'price' => '50000',
          'webImg' => '虹桥正荣中心.jpg',
          'wapImg' => '虹桥正荣中心.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '10154',
        ),
        3 => 
        array (
          'estateId' => '155286',
          'estateName' => '萧山宝龙城市广场',
          'webLink' => 'http://www.wkzf.com/hangzhou/xfdetail/0628fded847240cc.html',
          'wapLink' => 'http://m.wkzf.com/hangzhou/xfdetail/0628fded847240cc.html',
          'price' => '14001',
          'webImg' => '萧山宝龙城市广场.jpg',
          'wapImg' => '萧山宝龙城市广场.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12564',
        ),
      ),
    ),
    2 => 
    array (
      'name' => '热盘×领跑',
      'webLink' => 'http://www.wkzf.com/nantong/xflist',
      'wapLink' => 'http://m.wkzf.com/nantong/xflist',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '160494',
          'estateName' => '万豪臻品',
          'webLink' => 'http://www.wkzf.com/nantong/xfdetail/4d96060f4c7c4a50.html',
          'wapLink' => 'http://m.wkzf.com/nantong/xfdetail/4d96060f4c7c4a50.html',
          'price' => '5500',
          'webImg' => '万豪臻品.jpg',
          'wapImg' => '万豪臻品.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '13135',
        ),
        1 => 
        array (
          'estateId' => '155854',
          'estateName' => '山景水岸',
          'webLink' => 'http://www.wkzf.com/nantong/xfdetail/d10acd14bc9f8697.html',
          'wapLink' => 'http://m.wkzf.com/nantong/xfdetail/d10acd14bc9f8697.html',
          'price' => '',
          'webImg' => '山景水岸.jpg',
          'wapImg' => '山景水岸.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12588',
        ),
        2 => 
        array (
          'estateId' => '157445',
          'estateName' => '南通优山美地名邸',
          'webLink' => 'http://www.wkzf.com/nantong/xfdetail/8400b41cdd8d75cc.html',
          'wapLink' => 'http://m.wkzf.com/nantong/xfdetail/8400b41cdd8d75cc.html',
          'price' => '9000',
          'webImg' => '南通优山美地名邸.jpg',
          'wapImg' => '南通优山美地名邸.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12809',
        ),
        3 => 
        array (
          'estateId' => '155765',
          'estateName' => '名都豪庭',
          'webLink' => 'http://www.wkzf.com/nantong/xfdetail/1d18c86f54fa5c7f.html',
          'wapLink' => 'http://m.wkzf.com/nantong/xfdetail/1d18c86f54fa5c7f.html',
          'price' => '8500',
          'webImg' => '名都豪庭.jpg',
          'wapImg' => '名都豪庭.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12583',
        ),
      ),
    ),
    3 => 
    array (
      'name' => '精品×力荐',
      'webLink' => 'http://www.wkzf.com/ningbo/xflist',
      'wapLink' => 'http://m.wkzf.com/ningbo/xflist',
      'estates' => 
      array (
        0 => 
        array (
          'estateId' => '146858',
          'estateName' => '银亿上府',
          'webLink' => 'http://www.wkzf.com/ningbo/xfdetail/5f92f41d2a8f480e.html',
          'wapLink' => 'http://m.wkzf.com/ningbo/xfdetail/5f92f41d2a8f480e.html',
          'price' => '9000',
          'webImg' => '银亿上府.jpg',
          'wapImg' => '银亿上府.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12540',
        ),
        1 => 
        array (
          'estateId' => '146755',
          'estateName' => '美的公园天下',
          'webLink' => 'http://www.wkzf.com/ningbo/xfdetail/d1f25c3d67874c04.html',
          'wapLink' => 'http://m.wkzf.com/ningbo/xfdetail/d1f25c3d67874c04.html',
          'price' => '',
          'webImg' => '美的公园天下.jpg',
          'wapImg' => '美的公园天下.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '11255',
        ),
        2 => 
        array (
          'estateId' => '82108',
          'estateName' => '左岸尚苑',
          'webLink' => 'http://www.wkzf.com/ningbo/xfdetail/9dcb1a35a8612030.html',
          'wapLink' => 'http://m.wkzf.com/ningbo/xfdetail/9dcb1a35a8612030.html',
          'price' => '12000',
          'webImg' => '左岸尚苑.jpg',
          'wapImg' => '左岸尚苑.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '11243',
        ),
        3 => 
        array (
          'estateId' => '142729',
          'estateName' => '慈溪碧桂园',
          'webLink' => 'http://www.wkzf.com/ningbo/xfdetail/bf57ae351492acc9.html',
          'wapLink' => 'http://m.wkzf.com/ningbo/xfdetail/bf57ae351492acc9.html',
          'price' => '8100',
          'webImg' => '慈溪碧桂园.jpg',
          'wapImg' => '慈溪碧桂园.jpg',
          'hotline' => '4008208907',
          'hotlineSubNum' => '12514',
        )
      ),
    ),
  ),
  'estateLayout' => '2',
);
	?>