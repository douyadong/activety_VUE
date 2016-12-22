/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 1. 项目名称：微笑力MAX web页面
 2. 页面名称：weixiao -> web.html
 3. 作者：tangxuyang@lifang.com
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function MaxController() {
    		
}
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 继承WapController
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
MaxController.prototype = new WebController();
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
 显示预约框
 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
MaxController.prototype.showReverseDialog = function(estateId, estateName) {
    $('.reserve-form').data('id', estateId);
    $('.reserve-form').data('name', estateName);
    $('.reserve-form').show();
};

var controller = new MaxController();
var estates = [{
        estateId: "153191",
        estateName: "新西塘孔雀城",
    }, {
        estateId: "155712",
        estateName: "华润置地橡树湾"
    }, {
        estateId: "155079",
        estateName: "四季香榭"
    }, {
        estateId: "155079",
        estateName: "赞成名仕府邸"
    },


    {
        estateId: "155856",
        estateName: "山景水岸"
    }, {
        estateId: "155715",
        estateName: "名城花苑"
    }, {
        estateId: "155765",
        estateName: "名都豪庭"
    }, {
        estateId: "155259",
        estateName: "无锡田园东方"
    },
    //大品牌
    {
        estateId: "153101",
        estateName: "保利西塘越"
    }, {
        estateId: "155706",
        estateName: "嘉兴万达广场"
    }, {
        estateId: "154677",
        estateName: "中环国际公寓三期"
    }, {
        estateId: "143689",
        estateName: "万科翡翠雅宾利"
    },
    //任性购
    {
        estateId: "153100",
        estateName: "智富城Mimon公寓"
    }, {
        estateId: "144551",
        estateName: "MORE街区"
    }, {
        estateId: "155623",
        estateName: "嘉兴尚海年华"
    }, {
        estateId: "153093",
        estateName: "上影安吉新奇世界"
    },
    //地铁旁
    {
        estateId: "119211",
        estateName: "融创外滩188"
    }, {
        estateId: "145298",
        estateName: "香溢花城三期香溢天地"
    }, {
        estateId: "106565",
        estateName: "盛世滨江壹号公馆"
    }, {
        estateId: "15973",
        estateName: "华润外滩九里"
    }
];

function reserve(index) {
    var estate = estates[index];
    var estateId = estate.estateId,
        estateName = estate.estateName;
    controller.showReverseDialog(estateId, estateName);
}

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