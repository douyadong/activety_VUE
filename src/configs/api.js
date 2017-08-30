/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
1. 项目名称：凡事云webApp
2. 文件名：src -> configs -> api.js
3. 作者：zhaohuagang
4. 备注：提供restfulAPI接口配置
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
export default {    
    "timeout": 60 * 1000 ,  //超时请求时间，单位：毫秒
    "successStatusCode" : 1 ,    
    "prefix" : {
        "dev" : "//10.0.18.78:8107" ,
        "test" : "//m.test.wkzf" ,
        "sim" : "//m.sim.wkzf" ,
        "prod" : "//m.wkzf.com"
    } ,
    "suffix" : { //后缀代表接口去掉prefix的部分，这里可以是无限级的树状结构，根据自己的需要
        "common" : {
            "bigData":"buriedPoint/sendData.rest",
        }
    }
} ;