<template>
  <div class="house-resource">
    <p class="selection">我们为您精选了4套</p>
    <!--房源列表-->
    <ul class="house-list">
        <li v-for="(item,index) in data.data.rentHouseList" :key="index" @click="scrollBottom">
            <div>
                <img :src="item.firstImageUrl" alt="">
                <div class="house-info">
                    <p class="house-title">{{item.districtAndTownName}}</p>
                    <div class="introduction">{{item.houseTypeStr}}{{item.spaceArea}}m&sup2;&nbsp;|&nbsp;{{item.houseTitle}}</div>
                    <ul class="deploy">
                        <li v-if="item.houseTag.isPriceDown">满五唯一</li>
                        <li v-if="item.houseTag.isSubwayHouse">地铁</li>
                        <li v-if="item.houseTag.isNewHouse">近学校</li>
                    </ul>
                    <p class="cost"><span class="price" v-if="item.houseTag.isSouth">1120万</span><span class="unit">45400元/m&sup2;</span></p>
                </div>
            </div>
            <hr>
        </li>
    </ul>
    <!--底部信息-->
    <div class="choose">
        <p class="more">还有50套符合您需求的房子在悟空找房等您召唤！填写手机号，立即获取为您甄选的优秀房源详情</p>
        <div><input type="text" class="tel"> <span class="submit" @click="submit">提交</span></div>
        <p class="error" v-if="verify">请检查手机号哦，填写准确的手机号才能获取房源详情</p>
        <a href="http://android.myapp.com/myapp/detail.htm?apkName=com.wukong.ua&ADTAG=mobile"
        class="download" :data-bigdata="getUvParamsString({ eventName : 1207001 })">下载APP，查看更多符合条件的房源</a>
        <p class="bgc"></p>
    </div>
    <!--遮罩层-->
    <div v-if="modal" class="modal">
        <div class="backdrop">
            <div class="loader"></div>
                <p>甄选房源中...</p>
            </div>
    </div>
  </div>
</template>

<script>
    import data from "../../../mock/houseResource.json";
    import $ from "jquery";
    import "@/libraries/jquery.modal" ;
    export default{
        name:"downHouseResource",
        data(){
            return{
                data:data,
                verify:false,//手机号验证是否有效
                telNumber:'',//手机号
                "modal":false//提交数据的时候加载动画遮罩层是否显示
            }
        },
        created(){
            this.modal=true;//遮罩层处理;
              //埋点
            this.$bigData({
                pageName:1207,
                pageParam:{
                },
                type:1//1-pv，2-click
            });
        },
        mounted(){
            let that=this;
            setTimeout(function(){
                that.modal=false;
            },2000)
        },
        methods:{
             //获取用户点击埋点参数方法
            getUvParamsString : function({ eventName , otherParams }) {
                let eventParam = {};
                if(otherParams !== undefined && otherParams !== null ) {
                    eventParam = Object.assign( eventParam , otherParams ) ;
                }              
                return encodeURIComponent(JSON.stringify({ 
                    eventName : eventName , 
                    type : 2
                })) ;
            },
            // 提交手机号
            submit(){
                let reg=/^1[3|4|5|7|8][0-9]{9}$/;//手机验证正则
                this.telNumber=$('.tel').val();
                if(!reg.test(this.telNumber)){
                    this.verify=true;
                    $('.tel').val('');
                    return;
                }else{
                    this.verify=false;
                    $.modal({
                        "id" : "spreadErrorDialog" ,
                        "title" : "提示成功" ,
                        "content" : "房源将尽快到达，请留意" ,
                        "buttons" : [
                            { "text" : "关闭" ,"className" : "text-info" , "clickInterface" : function(){ $.modal.close("spreadErrorDialog") ; } }                             
                        ]
                    }) ;
                    $('.tel').val('');
                }
            },
            // 滑动到页面底部
            scrollBottom(){
                 let h = $(document).height()-$(window).height();
                 $(document).scrollTop(h); 
            }
        }
    }
</script>

<style lang="less" scoped>
    @import "../../less/down/houseResource.less";
</style>

