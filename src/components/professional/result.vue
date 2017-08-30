<template>    
    <div class="professional-result">        
        <header>
            <p v-if="points === 100">最卓越的经纪人！天底下没有您卖不出去的房子！</p>
            <p v-else-if="points >= 80 && points < 100">超优秀经纪人！离冠军只差一步之遥了哦！</p>
            <p v-else-if="points >= 60 && points < 80">要赶超更多优秀经纪人，还需要加倍努力呢！</p>
            <p v-else>革命尚未成功，快去努力学习快速进步吧！</p>
            <p><span>您的分数为</span> <span class="points">{{ points }} 分</span></p>
        </header>
        <ul>
            <li><router-link to="/professional" :data-bigdata="getUvParamsString({ eventName : 2074001 })" class="bigdata-btn">返回重新测试</router-link></li>
            <li @click="() => { guideStatus = 1 ; }" :data-bigdata="getUvParamsString({ eventName : 2074002 })" class="bigdata-btn">分享给你的朋友一起测试</li>
        </ul>
        <transition  name="slide-fade">
            <div class="mask" v-if="guideStatus">
                <div class="guide"><img src="../../assets/professional/guide.png" class="img-responsive"></div>
            </div>
        </transition>
    </div>
</template>

<script>
    import sharePict from "../../assets/professional/share.jpg" ;
    export default {
        name : "professionalResult" ,
        data () {
            return {
                "points" : 0 ,
                "guideStatus" : 0  //"请点击右上角分享按钮进行测试分享"这句提示的显示状态
            }
        } , 
        methods : {
            //获取埋点参数方法
            getUvParamsString : function(eventName) {                           
                return encodeURIComponent(JSON.stringify({ 
                    eventName : eventName , 
                    eventParam : {} ,
                    type : 2
                })) ;
            }
        } ,
        created() {
            //页面pv埋点
            this.$bigData({
                pageName : 2074 ,
                pageParam : {
                    "result_score" : this.$route.query.points
                } ,
                type : 1
            }) ;
        } ,      
        mounted() {
            document.title = "测试你的专业度！全国优秀的经纪人都在做！" ;
            this.points = parseInt( this.$route.query.points , 10 ) ;
            //微信分享设置
            this.$wechatShare({
                "timelineTitle" : "测试你的专业度！全国优秀的经纪人都在做！" ,                   
                "content" : "测测你在全国经济人中的排名！" ,
                "imgUrl" : sharePict ,
                "linkUrl" : "https://hd.wkzf.com/professional" ,                 
                "success" : function() { console.log("分享成功！") ;  } ,
                "fail" : function() { console.log("分享失败！") ;  } ,
                "cancel" : function() { console.log("您取消了分享！") ; } ,
                "complete" : function() { console.log("分享完成！") ; }
            }) ; 
        }
    }
</script>
<style lang="less" scoped>
    @import "../../less/professional/result.less" ; 
</style>