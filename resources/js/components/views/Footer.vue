<template>
   <div class="footer">

      <div class="wrap">
         <div class="group group-left">
            <div class="field-content">
               <p><img src="/img/logo2.png" alt=""></p>
               <p class="inline"><font-awesome-icon icon="street-view" size="lg"/>РК г. Нур-Султан ул. Бараева 25, ВП-1</p>
               <a class="inline" href="tel:1430"><p><font-awesome-icon icon="phone-square-alt" size="lg"/>1430</p></a>
               <a class="inline" href="mailto:info@astplus.kz"><p><font-awesome-icon icon="envelope-open-text" size="lg"/>info@1430.kz</p></a>
            </div>
         </div>


         <div class="group group-center">
            <div class="field-content">
               <h4 class="title">Карта сайта
                  <hr>
               </h4>

               <a href="/" class="inline">
                  <p><font-awesome-icon icon="angle-double-right" size="lg"/>Главная</p>
               </a>
               <a href="/about" class="inline">
                  <p><font-awesome-icon icon="angle-double-right" size="lg"/>О нас</p>
               </a>
               <a href="/doctors" class="inline">
                  <p><font-awesome-icon icon="angle-double-right" size="lg"/>Врачи</p>
               </a>
               <a href="/clinics" class="inline">
                  <p><font-awesome-icon icon="angle-double-right" size="lg"/>Клиники</p>
               </a>
               <a href="/contacts" class="inline">
                  <p><font-awesome-icon icon="angle-double-right" size="lg"/>Контакты</p>
               </a>
            </div>
         </div>

         <div class="group group-right">
            <div class="field-content">
               <h4 class="title">Информация
                  <hr>
               </h4>
               <a href="/online_pay" class="inline"><p><font-awesome-icon icon="angle-double-right" size="lg" />Оплата</p></a>
            </div>
         </div>
      </div>

   </div>

</div>
</template>


<script>

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEnvelopeOpenText, faPhoneSquareAlt, faSignInAlt, faUserPlus, faStreetView, faAngleDoubleRight } from '@fortawesome/free-solid-svg-icons'
import { faInstagram, faFacebook } from '@fortawesome/free-brands-svg-icons'

library.add(faEnvelopeOpenText, faPhoneSquareAlt, faInstagram, faFacebook, faSignInAlt, faUserPlus, faStreetView, faAngleDoubleRight)

Vue.component('font-awesome-icon', FontAwesomeIcon)


export default {
   data() {
      return {

      }
   },
   mounted() {
      //
   },
   methods: {

   }
}

</script>

<style lang="scss" scoped>

.footer{
   background: #4285f4 url('/img/logo3.png') no-repeat center center;
   background-size: 50%;
   background-attachment: fixed;
   background-position: bottom;
   background-repeat: no-repeat;
   *{color: #fff;}
   .title{
      font-size: 24px;
      text-align: center;
      hr{
         width: 62px;
         margin: 16px auto;

      }
   }
   p{
      margin: 0;
   }
   .inline{
      margin: 10px 0;
      display: block;
      svg{
         margin-right: 8px;
      }
   }
   .wrap{
      max-width: calc(1140px - 40px);
      height: calc(100% - 50px);
      margin: 0 auto;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      padding: 55px 20px 65px 20px;
   }
   .group-center, .group-right{
      &:before{
         content:'';
         display: block;
         width: 1px;
         background: #fff;
         position: absolute;
         left: -1px;
         height: 100%;
      }
      .field-content{
         padding: 50px 40px;
      }
      a{
         margin: 15px 0;
      }
   }
   .group-left{
      display: flex;
      flex-direction: column;
      .field-content{
         padding: 0 40px;
      }
      img{
         width: 240px;
         height: auto;
      }
   }
   .group{
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
      min-height: 100%;
      position: relative;

   }
}

</style>
