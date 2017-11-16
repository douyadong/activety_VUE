<template>
  <div id="downDetail">
    <fall-ground v-if="pageStates.fallGround" @aa="mm"></fall-ground>
    <fall-house-resource :cc="dd" v-if="pageStates.fallHouseResource"></fall-house-resource>
  </div>
</template>

<script>
import fallGround from "@/components/commons/fallGround"
import fallHouseResource from "@/components/commons/fallHouseResource"
export default{
  name:"downDetail",
  components:{fallGround,fallHouseResource},
  data(){
    return{
      pageStates:{
        fallGround:true,
        fallHouseResource:false
      },
      dd:''
    }
  },
  methods:{
     mm: function (bb){
              this.dd = bb//接受子组件向父组件传的值；
              if(this.dd){
                this.pageStates.fallGround=false;
                this.pageStates.fallHouseResource=true;
              }
              console.log(this.dd)
    }
  }

}
    
</script>

<style lang="less" scoped>
  #downDetail{
      background-color: #fff;
  }
</style>

