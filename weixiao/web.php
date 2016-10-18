<?php require_once("../public/global.php")?>
<?php
	ob_start();
?>
<?php
	$config = array(
		"imgs"=>array(array(
			"url" => "web_01.jpg",
			"original-demesion" => "[1920,763]",
			"shapes" => '[[1078,452,106,63,"javascript:showDialog()"]]'
		),array(
			"url" => "web_02.jpg",
			"original-demesion" => "[1920,1020]",
			"shapes" => '[[988,399,124,41,"javascript:reserve(0)"],[1386,399,124,41,"javascript:reserve(1)"],[988,853,124,41,"javascript:reserve(2)"],[1386,853,124,41,"javascript:reserve(3)"],[768,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/c0e1f04866474879.html"],[1164,93,370,224,"http://www.wkzf.com/nantong/xfdetail/0a6e9962f8f20d14.html"],[768,547,370,224,"http://www.wkzf.com/shanghai/xfdetail/0b64da93d4a7e7de.html"],[1164,547,370,224,"http://www.wkzf.com/shanghai/xfdetail/8d3b63c51a256471.html"]]'
		),array(
			"url" => "web_03.jpg",
			"original-demesion" => "[1920,1031]",
			"shapes" => '[[610,394,124,41,"javascript:reserve(4)"],[1009,395,124,41,"javascript:reserve(5)"],[607,851,124,41,"javascript:reserve(6)"],[1009,841,124,41,"javascript:reserve(7)"],[388,89,370,224,"http://www.wkzf.com/shanghai/xfdetail/a43eeafb6fcf0ead.html"],[781,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/949476d3b6f66d34.html"],[388,540,370,224,"http://www.wkzf.com/nantong/xfdetail/1d18c86f54fa5c7f.html"],[781,540,370,224,"http://www.wkzf.com/wuxi/xfdetail/4d01269ed77ff482.html"]]'
		),array(			
			"url" => "web_04.jpg",
			"original-demesion" => "[1920,1020]",
			"shapes" => '[[973,394,124,41,"javascript:reserve(8)"],[1371,396,124,41,"javascript:reserve(9)"],[957,850,124,41,"javascript:reserve(10)"],[1374,849,124,41,"javascript:reserve(11)"],[754,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/382da159d75ae02c.html"],[1152,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/3ab567a2f1c64d66.html"],[754,540,370,224,"http://www.wkzf.com/shanghai/xfdetail/7c1cc51f13a1fd5b.html"],[1152,540,370,224,"http://www.wkzf.com/shanghai/xfdetail/8acc32f4f1fdc714.html"]]'
		),array(
			"url" => "web_05.jpg",
			"original-demesion" => "[1920,1027]",
			"shapes" => '[[610,397,124,41,"javascript:reserve(12)"],[1009,397,124,41,"javascript:reserve(13)"],[609,851,124,41,"javascript:reserve(14)"],[1009,850,124,41,"javascript:reserve(15)"],[388,91,370,224,"http://www.wkzf.com/shanghai/xfdetail/65061edd0af64dd7.html"],[786,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/52ca2e3ac3c3d09e.html"],[388,545,370,224,"http://www.wkzf.com/shanghai/xfdetail/f2311b7eeb1c8667.html"],[786,545,370,224,"http://www.wkzf.com/shanghai/xfdetail/cd01836967482a33.html"]]'
		),array(
			"url" => "web_06.jpg",
			"original-demesion" => "[1920,1086]",
			"shapes" => '[[984,396,124,41,"javascript:reserve(16)"],[1381,396,124,41,"javascript:reserve(17)"],[982,849,124,41,"javascript:reserve(18)"],[1383,850,124,41,"javascript:reserve(19)"],[765,90,370,224,"http://www.wkzf.com/shanghai/xfdetail/45655e7dd4892fc7.html"],[1161,93,370,224,"http://www.wkzf.com/shanghai/xfdetail/8ae4aefde14e0631.html"],[765,544,370,224,"http://www.wkzf.com/shanghai/xfdetail/6184566c84c53459.html"],[1161,544,370,224,"http://www.wkzf.com/shanghai/xfdetail/e4385f01fcf32c79.html"]]'
		)));
?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="../public/css/alweb.min.css"></link>
		<style type="text/css">
			img{
				width:100%;
				margin-top:-.3rem;
				border:0;
			}
			body{
				margin:0;
				padding:0;
				min-width:1200px;
			}
		</style>
		<script src="../config.js">

		</script>
		<script src="../public/js/app.min.js">

		</script>
		<script src="../public/js/activitylist/web.min.js">

		</script>
		<script>
		function MaxController(){
			//WapController.call(this);		
		}
		MaxController.prototype = new WebController();
		MaxController.prototype.showReverseDialog = function(estateId,estateName){
			$('.reserve-form').data('id',estateId);
			$('.reserve-form').data('name',estateName);
			$('.reserve-form').show();
		};

		var controller = new MaxController();
		var estates = [{
			estateId:"153191",
			estateName:"新西塘孔雀城",			
		},{
			estateId:"155712",
			estateName:"华润置地橡树湾"			
		},{
			estateId:"155079",
			estateName:"四季香榭"
		},{
			estateId:"155079",
			estateName:"赞成名仕府邸"
		},


		{
			estateId:"155856",
			estateName:"山景水岸"
		},{
			estateId:"155715",
			estateName:"名城花苑"
		},{
			estateId:"155765",
			estateName:"名都豪庭"
		},{
			estateId:"155259",
			estateName:"无锡田园东方"
		},
		//大品牌
		{
			estateId:"153101",
			estateName:"保利西塘越"
		},{
			estateId:"155706",
			estateName:"嘉兴万达广场"
		},{
			estateId:"154677",
			estateName:"中环国际公寓三期"
		},{
			estateId:"143689",
			estateName:"万科翡翠雅宾利"
		},
		//任性购
		{
			estateId:"153100",
			estateName:"智富城Mimon公寓"
		},{
			estateId:"144551",
			estateName:"MORE街区"
		},{
			estateId:"155623",
			estateName:"嘉兴尚海年华"
		},{
			estateId:"153093",
			estateName:"上影安吉新奇世界"
		},
		//地铁旁
		{
			estateId:"119211",
			estateName:"融创外滩188"
		},{
			estateId:"145298",
			estateName:"香溢花城三期香溢天地"
		},{
			estateId:"106565",
			estateName:"盛世滨江壹号公馆"
		},{
			estateId:"15973",
			estateName:"华润外滩九里"
		}];
		function reserve(index){			
			var estate = estates[index];
			var estateId = estate.estateId, estateName = estate.estateName;
			controller.showReverseDialog(estateId,estateName);
		}
		</script>
	</head>
	<body>
		<?php
			foreach ($config["imgs"] as $img) {
		?>
			<img src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router['activity_name']; ?>/images/web/<?php echo $img['url']?>" <?php echo empty($img["original-demesion"])?"":("data-original-demension='" . $img["original-demesion"] . "' data-shapes='" . $img["shapes"] . "'") ?> />
		<?php
			}
		?>	

		<div class="reserve-form">
	<div class="content">
		<h3>看房预约</h3>
		<div class="item">
			<label>姓名:</label> <input type="text" placeholder="请输入姓名" name="name" />
		</div>
		<div class="item">
			<label>电话:</label> <input type="text" placeholder="请输入电话号码" name="phoneNumber"/>
		</div>
		<div class="item">
			<label>验证码:</label> <input type="text" placeholder="请输入验证码" name="verifyCode" /><button class="sendCodeBtn" id="sendCodeBtn">获取验证码</button>
		</div>
		<p class="tips-txt"></p>
		<div class="footer">
			<button class="confirmReserveBtn">确认预约</button>
			<button class="cancelBtn">取消</button>
		</div>
	</div>
</div>
<div class="success-dialog">
    <div class="success-dialog-bg"></div>
    <div class="w-alert-win" style="background: url('<?php echo $CURRENT_STATIC_DOMAIN?>/public/images/reserve_success.jpg') no-repeat scroll;"><span id="closeSuccess"></span></div>
</div>
<div id="joinDialog" style="display:none">   
	<div style="background:rgba(0,0,0,.4);bottom:0;left:0;right:0;position:fixed;top:0;z-index:9998"></div>
	<div style="padding:0 30% 30% 30%;z-index:9999;position:fixed;width:100%;top:60px">
		<img src='<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"] . '/images/web/popup.png'?>'/>
    </div>  
</div>
	</body>	
	<script type="text/javascript">
	function createMap(){
		$('map').remove();//删除map元素
		$('img[data-original-demension').each(function(index,img){//遍历有data-original-demension的img元素
			//读取原始大小
			var $this = $(this);
			var $body = $('body');
			var originalDemesion = $this.data('original-demension');
			var originalWidth = originalDemesion[0];
			var originalHeight = originalDemesion[1];
			var currentWidth = $this.width();
			var currentHeight = $this.height();
			
			//读取热点信息
			var shapes = $this.data('shapes');
			var name = $this.attr('name') || ('img_original_demesion'+index);
			var mapName = "map_"+name;
			var $map = $('<map></map>');
			$map.attr('name',mapName);
			var x1,x2,y1,y2,href;
			var xRatio = currentWidth/originalWidth;
			var yRatio = currentHeight/originalHeight;
			$.each(shapes,function(j,shape){
				x1 = parseInt(shape[0] * xRatio);
				y1 = parseInt(shape[1] * yRatio);
				x2 = parseInt((shape[0]+shape[2]) * xRatio);
				y2 = parseInt((shape[1]+shape[3]) * yRatio);
				href = shape[4];
				$map.append($('<area shape="rect" coords="'+(x1+","+y1+","+x2+","+y2)+'" href="'+href+'"></area>'));
			});
			$body.append($map);
			$this.attr('usemap',"#"+mapName);
		});
	}

	function showDialog(){
		$('#joinDialog').show();
	}

	$(function(){		
		$(window).on('resize',createMap);

		$('#joinDialog img').click(function(){
			$('#joinDialog').hide();
		});
	});
	window.onload = createMap;
	</script>
	<?php require_once("../public/components/GA_Baidu_statistic.php");?>
</html>
<?php
	require_once("../public/components/save_file.php");
	ob_end_flush();
?>