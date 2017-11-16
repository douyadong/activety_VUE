/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
1. 项目名称：凡事云webApp
2. 文件名：src -> router -> index.js
3. 作者：zhaohuagang
4. 备注：系统路由
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
import Vue from "vue" ;
import Router from "vue-router" ;
/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
加载测试您的专业度模块路由用到的组件
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
import professionalTest from "@/components/professional/test" ;
import professionalResult from "@/components/professional/result" ;
import downPurchase from "@/components/down/purchase";
import downHouseResource from "@/components/down/houseResource"
/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
使用路由插件
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
Vue.use(Router) ;
/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
路由定义
@mode : hash | history，默认为hash，就是路由中域名和后面部分用#隔开，如：http://localhost:8080/#/agent，如果改成history模式，这个路由风格就变成了：
    http://localhost:8080/agent，但是这种模式需要对nginx | apache等appserver进行配置：
    Nginx 的站点设置增加：
    location / {
        try_files $uri $uri/ /index.html ;
    }
    Apache的站点设置增加：
    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /
        RewriteRule ^index\.html$ - [L]
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule . /index.html [L]
    </IfModule>
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
export default new Router({
    mode : "history" ,
    routes : [
        {
            path : "/professional" ,
            name : "professionalTest",
            component : professionalTest
        } ,
        {
            path : "/professional/result" ,
            name : "professionalResult",
            component : professionalResult
        } ,
        {
            path:"/down/purchase",
            name:"downPurchase",
            component:downPurchase
        },
        {
            path:"/down/houseResource",
            name:"downHouseResource",
            component:downHouseResource
        }
    ]
}) ;