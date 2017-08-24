<template>
    <transition  name="slide-fade"> 
        <dl class="faq">
            <dt>
                <ul>
                    <li><img src="../../assets/professional/caption-top.png" class="img-responsive"></li>
                    <li class="desc">{{ question }}</li>
                    <li><img src="../../assets/professional/caption-bottom.png" class="img-responsive"></li>
                </ul>
            </dt>
            <dd :data-index="index" v-for="(item , index) in keys" @click="checked">{{ item }}</dd>            
        </dl>
    </transition>
</template>

<script>
    import $ from "jquery" ;    
    export default {
        name : "faq" ,
        data () {
            return {               
            }
        } ,             
        props : [ "question" , "keys" , "handler" ]  ,
        methods : {
            checked(event) {
                let selectedIndex = $(event.target).data("index") ;
                $(event.target).addClass("checked") ;
                if(typeof this.handler == "function") this.handler(selectedIndex) ;
            }
        }    
    }
</script>
<style lang="less" scoped>
    @import "../../less/components/faq.less" ;   
</style>