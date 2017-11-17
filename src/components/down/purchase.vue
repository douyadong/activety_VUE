<template>
    <div class="fall-ground">
        <div class="question-img">
            <img src="../../assets/fall/head.png" alt="">
        </div>
        <!--购房选项-->
        <div class="options">
            <!--房屋预算-->
            <span class="spot">.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.</span>
            <p class="option-title">1、您的买房预算是多少？</p>
            <div class="house-price">
                <div class="move">
                     <ul>
                        <li @click="bounce($event)">150</li>
                        <li @click="bounce($event)">300</li>
                        <li @click="bounce($event)">500</li>
                        <li @click="bounce($event)">800</li>
                        <li @click="bounce($event)">1200</li>
                        <li @click="bounce($event)">1800</li>
                    </ul>
                    <div class="icon-house" @touchstart="touchStart" @touchmove="touchMove"  @touchend="touchEnd" 
                    :style="'transform:translateX('+pageStates.summaryStyle+'rem)'">
                        <img src="../../assets/fall/iconhouse.png" alt="">
                    </div>
                </div>
                <div class="unit">单位：万</div>
            </div>
            <!--房屋类型-->
            <span class="spot">.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.</span>
            <p class="option-title">2、您想要什么户型？（可选1-2项）</p>
            <div class="house-type">
                <ul>
                    <li @click="houseType($event)" data-type="1">一室</li>
                    <li @click="houseType($event)" data-type="2">两室</li>
                    <li @click="houseType($event)" data-type="3">三室</li>
                    <li @click="houseType($event)" data-type="4">四室</li>
                    <li @click="houseType($event)" data-type="5">五室及以上</li>
                </ul>
            </div>
            <!--房屋位置-->
            <span class="spot">.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.</span>
            <p class="option-title">3、您想要什么位置的房子？（可选1-3项）</p>
            <div class="house-location">
                <ul>
                    <li @click="houseLocation($event)" data-location="1">奉贤</li>
                    <li @click="houseLocation($event)" data-location="2">虹口</li>
                    <li @click="houseLocation($event)" data-location="3">金山</li>
                    <li @click="houseLocation($event)" data-location="4">青浦</li>
                    <li @click="houseLocation($event)" data-location="5">长宁</li>
                    <li @click="houseLocation($event)" data-location="6">静安</li>
                    <li @click="houseLocation($event)" class="chongming" data-location="7">崇明</li>
                    <li @click="houseLocation($event)" data-location="8">黄埔</li>
                </ul>
            </div>
            <!--其它购房需求-->
            <span class="spot">.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.</span>
            <p class="option-title">4、您还有以下购房需求吗？（可多选）</p>
            <div class="other-need">
                <ul>
                    <li @click="otherNeed($event)" data-other="1">近地铁</li>
                    <li @click="otherNeed($event)" data-other="2">近学校</li>
                    <li @click="otherNeed($event)" data-other="3">南北通透</li>
                </ul>
            </div>
        </div>
        <!--扫描房源-->
        <p class="scan" @click="scan" :data-bigdata="getUvParamsString({ eventName : 1206001 })">扫描房源</p>
        <!--为了使背景色一致-->
        <div class="bgc"></div>
        <!--点击扫描房源时的加载动画-->
        <div v-if="pageStates.modal" class="modal">
            <div class="backdrop">
                <div class="loader"></div>
                <p>甄选房源中...</p>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';
    import "@/libraries/jquery.tips.js";
    export default{
        name:"downPurchase",
        data(){
            return{
                pageStates:{
                    "startX":0,//触摸的位置X坐标
                    "dynamicX" : 0 ,  //滑动的时候的动态X坐标
                    "distanceX" : 0 ,  //滑动的距离
                    "iconLeft":0,//移动小屋初始定位left值
                    "summaryStyle" : 1.4, //滑动对象的样式
                    "juli":0,//记录touchstart时的summaryStyle
                    "modal":false,//提交数据的时候加载动画遮罩层是否显示
                },
                info:{
                    "price":"1",//房屋价格
                    "houseType":'',//选中的房源类型
                    "houseLocation":'',//选中的房源位置类型
                    "otherNeed":''//选中的其它房源需求
                },
            }
        },
        created(){
            //埋点
            this.$bigData({
                pageName:1206,
                pageParam:{
                },
                type:1//1-pv，2-click
            });
        },
        methods:{
            //获取用户点击埋点参数方法
            getUvParamsString : function({ eventName , otherParams }) {
                let eventParam = {} ;
                if(otherParams !== undefined && otherParams !== null ) {
                    eventParam = Object.assign( eventParam , otherParams ) ;
                }              
                return encodeURIComponent(JSON.stringify({ 
                    eventName : eventName , 
                    type : 2
                })) ;
            },
            // 点击移动事件;
            bounce(e){
                // 此处为点击图标瞬间移动
                let count=$('.move li').index($(e.target));
                $('.icon-house').css("transform","translateX("+(1.4+4.4*count)+"rem)")
                if(count==0)  this.info.price="1";
                if(count==1)  this.info.price="2";
                if(count==2)  this.info.price="3";
                if(count==3)  this.info.price="4";
                if(count==4)  this.info.price="5";
                if(count==5)  this.info.price="6";
            },
            // 以下事件为拖拽动画实现
            touchStart(event){
                this.pageStates.startX = event.targetTouches[0].pageX ;  //记录下触摸位置X坐标
                this.pageStates.juli=this.pageStates.summaryStyle
            },
            touchMove(event){
                this.pageStates.dynamicX = event.targetTouches[0].pageX ;  //记录下滑动的时候的动态X坐标
                this.pageStates.distanceX = (this.pageStates.dynamicX - this.pageStates.startX)/20 ;  //计算滑动距离
                this.pageStates.summaryStyle =this.pageStates.juli+this.pageStates.distanceX;
                if(this.pageStates.summaryStyle>=22.9){
                    this.pageStates.summaryStyle=22.9//此处22.9为6个li标签总宽度25.2-小房子宽度2.3
                }
                if(this.pageStates.summaryStyle<=0){
                    this.pageStates.summaryStyle=0
                }  
            },
            touchEnd(event){
                // 为最终的summaryStyle定值
                if(this.pageStates.summaryStyle<=0){
                    this.pageStates.summaryStyle=0
                }else if(this.pageStates.summaryStyle>=22.9){
                    this.pageStates.summaryStyle=22.9
                }
                else{
                    this.pageStates.summaryStyle =this.pageStates.juli+this.pageStates.distanceX;
                }
                // 根据summaryStyle和li确定price的值;
                if(0<=this.pageStates.summaryStyle<=4.2)this.info.price="1";
                if(0<this.pageStates.summaryStyle<=8.4)this.info.price="2";
                if(8.4<this.pageStates.summaryStyle<=12.6)this.info.price="3";
                if(12.6<this.pageStates.summaryStyle<=16.8)this.info.price="4";
                if(16.8<this.pageStates.summaryStyle<=21)this.info.price="5";
                if(21<this.pageStates.summaryStyle<=22.9)this.info.price="6";
            },
            // 获取选中房源类型；
            houseType(e){
                let count=$('.house-type li').index($(e.target));//获取点击元素的下标;
                $('.house-type li:eq('+count+')').toggleClass('active');
                if($('.house-type li.active').length>=3){
                    $.tips("该题只能选1-2项哦",2)
                    $('.house-type li:eq('+count+')').toggleClass('active');
                }
            },
            // 获取选中房源位置;
            houseLocation(e){
                let count=$('.house-location li').index($(e.target));//获取点击元素的下标;
                $('.house-location li:eq('+count+')').toggleClass('active');
                if($('.house-location li.active').length>=4){
                    $.tips("该题只能选1-3项哦",2)
                    $('.house-location li:eq('+count+')').toggleClass('active');
                }

            },
            // 获取选中房源其他需求;
            otherNeed(e){
                let count=$('.other-need li').index($(e.target));//获取点击元素的下标;
                $('.other-need li:eq('+count+')').toggleClass('active')

            },
            // 扫描房源
            scan(){
                this.info.houseType='';
                this.info.houseLocation='';
                this.info.otherNeed='';//每次点击扫描房源时都要清空三个数组,之后再进行添加数据到数组中;
                for(let i=0;i<$('.house-type li.active').length;i++){
                    // this.info.houseType.push($('.house-type li.active:eq('+i+')').data('type'))
                    this.info.houseType=this.info.houseType+'&type='+$('.house-type li.active:eq('+i+')').data('type')

                }
                for(let i=0;i<$('.house-location li.active').length;i++){
                    // this.info.houseLocation.push($('.house-location li.active:eq('+i+')').data('location'))
                    this.info.houseLocation=this.info.houseLocation+'&location='+$('.house-location li.active:eq('+i+')').data('location')
                }
                for(let i=0;i<$('.other-need li.active').length;i++){
                    // this.info.otherNeed.push($('.other-need li.active:eq('+i+')').data('other'))
                    this.info.otherNeed=this.info.otherNeed+'&other='+$('.other-need li.active:eq('+i+')').data('other')
                }
                // 判断第二题和第三题是否填写;
                if(this.info.houseType.length==0){
                    $.tips("第2题还没填写，填写后我们才能更精确捕捉您所需的房源",2)
                    return;
                }
                if(this.info.houseLocation.length==0){
                    $.tips("第3题还没填写，填写后我们才能更精确捕捉您所需的房源",2)
                    return;
                };
                this.pageStates.modal=true;//遮罩层显示;
                // 在地址栏里传递搜索的条件信息;
                this.$router.push({
                    path:"/down/houseResource?price="+ this.info.price+this.info.houseType+this.info.houseLocation+this.info.otherNeed
                }); 
            }
        }
    }
</script>
 
<style lang="less" scoped>
    @import "../../less/down/purchase.less";
</style>

