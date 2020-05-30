<template>
   <div class="services">

      <tabs :options="{ useUrlFragment: false }" @changed="tabChanged">
         <tab name="Онлайн консультация" id="online_doctors" prefix="<span class='icon'><img src='/img/services/icon1.png'></span>">
            <online-doctors></online-doctors>
         </tab>
         <tab name="Запись на очный прием" id="offline_doctors" prefix="<span class='icon'><img src='/img/services/icon2.png'></span> ">
            Запись на очный прием
         </tab>
         <tab name="Расшифровка анализов" prefix="<span class='icon'><img src='/img/services/icon3.png'></span> ">
            Расшифровка анализов
         </tab>
         <tab name="Медицинский сервис" prefix="<span class='icon'><img src='/img/services/icon4.png'></span> ">
            Медицинский сервис
         </tab>
      </tabs>

   </div>
</template>


<script>

import {Tabs, Tab} from 'vue-tabs-component';
import onlineDoctors from './OnlineDoctors';

export default {

   components:{
      Tabs,
      Tab,
      onlineDoctors
   },

   data(){
      return{
         activeTab: null
      }
   },

   methods: {

      tabChanged(data){
         this.activeTab = data.tab.id
      }

   },

   data () {
      return {

      }
   },
}



</script>


<style lang="scss">

.services{
   margin-bottom: 60px;
   .headers{
      margin-bottom: 20px;
   }

   .tabs-component-tab {
      &.is-active{
         a:after{
            opacity: 1;
            border:1px solid rgb(58, 117, 184);
            transform: scale(1.05);
         }
      }
      a{
         width: 255px;
         height: 185px;
         text-align: center;
         margin: 10px;
         cursor: pointer;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         position: relative;
         &:after{
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            border:1px solid rgba(0,0,0,.15);
            border-radius: 4px;
            position: absolute;
            top: 0;
            left: 0;
            transition: .2s;
         }
      }
   }
   .tabs-component-tabs{
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 215px;
      border-bottom: 1px solid rgba(0,0,0,.15);
      .icon{
         margin-bottom: 10px;
         img{
            width: 80px;
         }
      }
      .tabs-component-tab-a{
         text-transform: uppercase;
         font-size: 16px;
         color: #404040;
      }
   }
   .tab-content{
      margin-top: 40px;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 1px 5px 0 rgba(0,0,0,.1), 0 1px 5px 0 rgba(0,0,0,.1);

      .block-title{
         text-align: center;
         font-size: 28px;
         &:after{
            content: '';
            display: block;
            height: 1px;
            width: 150px;
            background: rgb(58, 117, 184);
            margin: 15px auto;

         }
      }
   }
}

</style>
