/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
1. 项目名称：yfyk2h5
2. 文件名：src -> plugins -> wechatShare.js
3. 作者：tangxuyang@lifang.com
4. 备注：全局js
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
import $ from 'jquery';
import apiDataFilter from '@/libraries/apiDataFilter';
export default {
	install(Vue,options){
		let env = apiDataFilter.getEnv();
		let apiPrefix = "//wechat.wkzf.com/";
		if (env === "test") apiPrefix = "//10.0.18.79:8134/" ;
    	else if (env === "beta") apiPrefix = "//wechat-beta.wkzf.com/" ;
    	else if (env === "sim") apiPrefix = "//wechat.sim.wkzf/" ;
    	else if (env === "prod") apiPrefix = "//wechat.wkzf.com/" ;
    	let apiUrl = apiPrefix + "wx_js_sdk_sign.rest?wechatCode=1000020";

    	let initial = true;
    	wx.ready(function() {
    		wx.showOptionMenu();	                    		
	    });

    	/*
			options:{
				timelineTitle:"",
				linkUrl:"",
				imgUrl:"",
				title:"",
				content:"",
				trigger:function(){
	
				},
				success:function(){
	
				},
				fail:function(){
	
				},
				complete:function(){
	
				}
			}
    	*/
		Vue.wechatShare = Vue.prototype.$wechatShare = function(options){			
			$.ajax({
	        	url : apiUrl ,
	        	type : "GET" ,
	        	data : { requestUrl : window.location.href } ,
	        	dataType : "jsonp" ,        
		        error : function(e) {
		            //console.log("error:" + e);
		        } ,
	        	success : function(result) {	        		
	            	var data = result.data ;
		            wx.config({
		                debug : false , // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		                appId : data.appid , // 必填，企业号的唯一标识，此处填写企业号corpid
		                timestamp : data.timestamp , // 必填，生成签名的时间戳
		                nonceStr : data.nonce_str , // 必填，生成签名的随机串
		                signature : data.signature , // 必填，签名，见附录1
		                jsApiList : ['onMenuShareAppMessage', 'onMenuShareTimeline'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
		            }) ;
		            
		            wx.ready(function(){
		            	wx.onMenuShareTimeline({
					        title : options.timelineTitle || window.document.title,
					        link : options.linkUrl || window.location.href ,
					        imgUrl : options.imgUrl ,
					        trigger : options.trigger ,
					        success : options.success ,
					        cancel : options.cancel ,
					        fail : options.fail,
					        complete:options.complete
					    });

					    wx.onMenuShareAppMessage({
					        title : options.title || window.document.title, // 分享标题
					        desc : options.content , // 分享描述
					        link : options.linkUrl || window.location.href, // 分享链接
					        imgUrl : options.imgUrl , // 分享图标
					        type : '' , // 分享类型,music、video或link，不填默认为link
					        dataUrl : '' , // 如果type是music或video，则要提供数据链接，默认为空
					        trigger : options.trigger ,
					        success : options.success ,
					        cancel : options.cancel ,
					        fail : options.fail,
					        complete:options.complete
					    });
		            });		            
	        	}
	    	});
		};
	}
};
