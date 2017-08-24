/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
1. 项目名称：yfyk2h5
2. 文件名：src -> plugins -> bigData.js
3. 作者：tangxuyang@lifang.com
4. 备注：全局js
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
import $ from 'jquery';
import apiDataFilter from '@/libraries/apiDataFilter';
import utils from '@/libraries/utils';

export default {
	install(Vue,options){

		let ls = {};
		let getLocalStorage = function(){
			return window.localStorage || ls;
		};

		//从localStorage中读取未成功的大数据埋点
		let getBigData = function(){
			if(getLocalStorage().bigData){
				return JSON.parse(getLocalStorage().bigData);
			}else{
				return [];
			}
		};

		//设置未成功的大数据埋点到localStorage
		let setBigData = function(data){
			getLocalStorage().bigData = JSON.stringify(data);
		};

		let getTotal = function(){
			if(getLocalStorage().bigDataTotal){
				return parseInt(getLocalStorage().bigDataTotal);
			}else{
				return 1;
			}
		}

		let setTotal = function(total){
			getLocalStorage().bigDataTotal = total;
		}

		//插入一条埋点数据到localStorage
		let insertBigData = function(item){
			let items = getBigData()||[];
			items.push(item);
			setBigData(items);
		}

		//发送埋点请求
		let send = function(item){
			//item.cookieId = utils.getCookieId();
			//console.log("send...",item);
			let total = getTotal();
			//item.pCount = total - 1;
			apiDataFilter.request({
				apiPath:"common.bigData",
				data:item,
				successCallback:function(){
					traverse();
				},
				errorCallback:function(res,res2){
					//失败时插入localStorage
					/*if(!res2){
						insertBigData(item);
					}else{
						traverse();
					}*/
					insertBigData(item);
				}
			});
		};

		//从localStorage中读取一个bigData发送出去
		let traverse = function(){
			let items = getBigData();
			if(items && items.length > 0){
				let item = items.splice(0,1)[0];
				setBigData(items);
				send(item);
			}
		};

		let bigData = function(data){
			data.cookieId = utils.getCookieId();
			let total = getTotal();
			data.pNum = total;
			setTotal(total+1);
			send(data);
			//insertBigData(data);
			//traverse();
			/*apiDataFilter.request({
				apiPath:"common.bigData",
				data:data,
				successCallback:function(){
					//console.log(data,"埋点成功！");					
				},
				errorCallback:function(){
					
				}
			});*/
		};

		window.document.body.addEventListener("click",function(event){
			//判断是否埋点元素
			let $target = $(event.target);
			let data = $target.data('bigdata');
			if(data){				
				//alert('bigdata');
				data = JSON.parse(decodeURIComponent(data));
				data.type = 2;				
				bigData(data);
			}else{
				let $parents = $target.parents('[data-bigdata]');
				
				if($parents.length>0){
					//alert('bigdata');
					data = $parents.data('bigdata');
					data = JSON.parse(decodeURIComponent(data));
					data.type = 2;
					bigData(data);
				}
			}
		},true);

		Vue.bigData = Vue.prototype.$bigData = bigData;
	}
};