# yfyk2h5

> yfyk2 wap

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

For detailed explanation on how things work, checkout the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).


## Plugins using in this project
### vue-router
### wechatShare
这是自定义插件，封装了微信分享的功能。在微信分享需要修改分享的标题和图片时使用。  
使用方式如下:
```
created:function(){
	this.$wechatShare({
		timelineTitle:"", //为空时会取当前页面的title,window.document.title
		linkUrl:"", //为空时会去当前页面的window.location.href
		imgUrl:"",
		title:"", //为空时会取当前页面的title,window.document.title
		content:"",
		trigger:function(){

		},
		success:function(){

		},
		fail:function(){

		},
		complete:function(){

		}
	});
}
```