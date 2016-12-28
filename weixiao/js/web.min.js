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
//MaxController.prototype = new WebController();
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
        estateId: "158180",
        estateName: "翡翠名都",
    }, {
        estateId: "161276",
        estateName: "摩尔公馆"
    }, {
        estateId: "154842",
        estateName: "四季香榭"
    }, {
        estateId: "146858",
        estateName: "银亿上府"
    },


    {
        estateId: "155854",
        estateName: "山景水岸"
    }, {
        estateId: "156173",
        estateName: "名城花苑"
    }, {
        estateId: "155765",
        estateName: "名都豪庭"
    }, {
        estateId: "155259",
        estateName: "田园东方"
    },
    //大品牌
    {
        estateId: "107503",
        estateName: "保利西塘越"
    }, {
        estateId: "149345",
        estateName: "绿地滨江中央广场"
    }, {
        estateId: "107277",
        estateName: "旭辉铂悦西郊"
    }, {
        estateId: "142729",
        estateName: "慈溪碧桂园"
    },
    //任性购
    {
        estateId: "146967",
        estateName: "智富城Mimon公寓"
    }, {
        estateId: "161282",
        estateName: "绿地中心"
    }, {
        estateId: "155378",
        estateName: "嘉兴尚海年华"
    }, {
        estateId: "161381",
        estateName: "金泰城"
    },
    //地铁旁
    {
        estateId: "154821",
        estateName: "高和海德公馆"
    }, {
        estateId: "145298",
        estateName: "香溢花城三期香溢天地"
    }, {
        estateId: "106821",
        estateName: "南京西路公馆"
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
	$('img[data-original-demension]').each(function(index,img){//遍历有data-original-demension的img元素
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