<template>    
    <div class="professional-test">
        <header><img src="../../assets/professional/header.png" class="img-responsive"></header>
        <faq :handler="capture" question="1、刘某与甲保险公司确定投保房屋保险价值为40万元，若保险事故发生时，该房屋的市场价格为38万元，房屋重置价格为25万元，保险标的房屋损失比例为30%。如果采用定值保险，保险人需支付的保险赔偿金数额为( )。" :keys="[ 'A. 7.5万元' , 'B. 11.4万元' , 'C. 12万元' , 'D. 38万元']" v-show=" currentIndex === 0 " />
        <faq :handler="capture" question="2、下列关于房地产价格的表述中，不正确的是( )。" :keys="[ 'A. 政府干预某种房地产价格时，可以规定其成本构成和利润率' , 'B. 市区一条高架轻轨线路在某多层住宅楼前通过，将导致其价格上升' , 'C. 城市中家庭平均人口的下降，商品住宅的价格可能有上涨的趋势' , 'D.某区域居民文化素质与文明程度的提高，使得该区域房地产价格可能上升']"  v-show=" currentIndex === 1 " />
        <faq :handler="capture" question="3、某房地产项目的土地取得费用为1000 万元，土地开发费用为500万元，建筑物建造所需直接费用为2000 万元，管理费为100万元。该房地产的开发成本为( )。" :keys="[ 'A. 2500 万元' , 'B. 2600万元' , 'C. 3500 万元' , 'D. 3600万元']"  v-show=" currentIndex === 2 " />
        <faq :handler="capture" question="4、根据中国人民银行规定，购房人以房地产作抵押的，抵押人和抵押权人应当签订书面抵押合同，抵押合同自( )之日起生效。" :keys="[ 'A. 合同当事人签字' , 'B. 合同公证' , 'C. 抵押物登记' , 'D. 抵押权人放贷']" v-show=" currentIndex === 3 " />
        <faq :handler="capture" question="5、《商品房买卖合同示范文本》中规定，设计单位同意的设计变更，导致买受人所购商品房使用功能受到影响的，出卖人应当在有关部门批准同意之日起( )日内，书面通知买受人。" :keys="[ 'A. 10' , 'B. 15' , 'C. 20' , 'D. 30']" v-show=" currentIndex === 4 " />
        <faq :handler="capture" question="6、代理的特点包括( )。" :keys="[ 'A. 经纪人与委托人之间无长期固定的合作关系' , 'B. 代理过程中的权利和责任归委托人' , 'C. 以自己的名义与第三方交易' , 'D. 经纪人可以以高于委托人指定的价格卖出，从中获利']" v-show=" currentIndex === 5 " />
        <faq :handler="capture" question="7、一套二手商铺的买卖双方均为个人，且买方有贷款，在交易过户时各需要缴纳哪些税费？" :keys="[ 'A. 出售方：增值税及附加、土地增值税、个人所得税；买入方：契税、合同印花税、转移登记费、个人所得税' , 'B. 出售方：土地增值税、个人所得税、合同印花税；买入方：契税、转移登记费、抵押登记费、个人所得税' , 'C. 出售方：增值税及附加、土地增值税、个人所得税、合同印花税；买入方：契税、合同印花税、转移登记费、抵押登记费' , 'D. 出售方：增值税及附加、土地增值税、合同印花税；买入方：契税、合同印花税、抵押登记费、个人所得税']" v-show=" currentIndex === 6 " />
        <faq :handler="capture" question="8、关于违约责任说法正确的是( )。" :keys="[ 'A. 对于债务的履行不当或履行不能，原则上均可请求继续履行或补充履行' , 'B. 因迟疑履行给付违约金后，可免除违约人的合同义务' , 'C. 在违约人继续履行或采取补救措施后，相对人还有损失的，可请求损害赔偿' , 'D. 在当事人违约行为侵害对方人身或财产的，对方有请求违约损害赔偿和侵权赔偿的权利']" v-show=" currentIndex === 7 " />
        <faq :handler="capture" question="9、某套住房的建筑面积100m2，总价为45万元。如果首付15万元，余款可以在三年内的每年年末支付10万元，假设年利率为5%，则该套住房的实际单价为( )。" :keys="[ 'A. 4223元/m2' , 'B. 4288元/m2' , 'C. 4357元/m2' , 'D. 4500元/m2']" v-show=" currentIndex === 8 " />
        <faq :handler="capture" question="10、房地产代理业务类型中，不属于房地产卖方代理业务的是( )。" :keys="[ 'A. 二手房出租代理' , 'B. 房屋承租代理' , 'C. 期房预售代理' , 'D. 房屋转租代理']" v-show=" currentIndex === 9 " />        
    </div>
</template>

<script>
    import faq from "@/components/commons/faq" ;
    export default {
        name : "professionalTest" ,
        data () {
            return {
                "currentIndex" : 0 ,
                "keys" : [] ,
                "rightKeys" : [ 2 , 1 , 0 , 2 , 0 , 1 , 2 , 2 , 0 , 1 ]
            }
        } ,
        methods : {
            capture(selectedIndex) {
                this.keys.push(selectedIndex) ;
                window.setTimeout(()=>{
                    this.currentIndex ++ ;
                    if(this.currentIndex > 9) {
                        //表示是最后一题了，就要计算分数再跳转
                        let points = 0 ;
                        for(let n = 0 ; n < this.rightKeys.length ; n ++) {
                            if(this.rightKeys[n] === parseInt(this.keys[n] , 10)) points += 10 ;
                        }
                        this.$router.push({ "path" : "/professional/result?points=" + points }) ;
                    }
                } , 200) ;               
            }
        } ,       
        mounted() {
            document.title = "测试你的专业度！全国优秀的经纪人都在做！" ;             
             //页面pv埋点             
            this.$bigData({
                pageName : 2073 ,
                pageParam : {} ,
                type : 1
            }) ;            
        } ,
        components : {
            faq
        }
    }
</script>
<style lang="less" scoped>
    @import "../../less/professional/test.less" ; 
</style>