/*++----------------------------------------------------------------------------------------------------------------------------------------------------------------------
1. 项目名称：yfyk
2. 文件名：src -> libraries -> utils.js
3. 作者：zhaohuagang@lifang.com
4. 备注：工具方法
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
import apiDataFilter from "@/libraries/apiDataFilter" ;
/*++-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
生成guid
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------++*/
let utils = {
    //生成GUID的辅助函数
    s4() {
        return ((( 1 + Math.random() ) * 0x10000) | 0 ).toString(16).substring(1) ;
    } ,
    //生成GUID
    guid() {
        return this.s4() + this.s4() + "-" + this.s4() + "-" + this.s4() + "-" + this.s4() + "-" + this.s4() + this.s4() + this.s4() ; 
    } ,
    //从localStorage里面取得cookieId，如果没有用guid填充再返回
    getCookieId() {
        if( ! localStorage.cookieId ) localStorage.cookieId = this.guid() ;
        return localStorage.cookieId ;
    } ,
    //检查是否是登录状态，如果没有就跳转到登录页面并带上redirect参数
    checkLoginStatus({ onCallback , offCallback }) {
        apiDataFilter.request({
            apiPath : "member.checkLoginStatus" ,
            data : { "uuid" : localStorage.yfyk2h5Token } ,              
            successCallback : res => {
                let status = res.body.data.status.toString() ;
                if( status === "1") {
                    if( onCallback && typeof onCallback == "function") onCallback() ;
                }
                else {
                    if( offCallback && typeof offCallback == "function") offCallback() ;
                }                
            }
        }) ;
    }
}

export default utils ;