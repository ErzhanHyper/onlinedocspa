<template>
   <div>
      <div class="header">

         <div class="top-header">
            <div class="group-left">
               <a href="mailto:help@1430.kz"><font-awesome-icon icon="envelope-open-text" />help@1430.kz</a>
               <a href="tel:1430"><font-awesome-icon icon="phone-square-alt" />1430 | call-center</a>
            </div>
            <div class="group-right">
               <a href="https://www.instagram.com/1430.kz/" target="_blank"><font-awesome-icon :icon="['fab', 'instagram']" size="lg"/></a>
               <a href="https://www.facebook.com/Astana-1430-1100532166769064/" target="_blank"><font-awesome-icon :icon="['fab', 'facebook']" size="lg"/></a>
            </div>
         </div>

         <div class="bottom-header">
            <div class="group-left">
               <router-link to="/" class="main-logo"> <img src='img/logo1.png' alt=""></router-link>
            </div>

            <div class="group-center">
               <ul class="main-menu items" id="main-menu">
                  <li class="item">
                     <router-link to="/">Главная</router-link>
                  </li>
                  <li class="item">
                     <router-link class="link" to="/about">О нас</router-link>
                  </li>
                  <li class="item">
                     <router-link class="link" to="/doctors" id="go-service" >Врачи</router-link>
                  </li>
                  <li class="item">
                     <router-link class="link" to="/contacts">Контакты</router-link>
                  </li>
               </ul>
            </div>

            <div class="group-right" >
               <div v-if="authenticated && user">
                  <v-avatar :height="40" :width="40">
                     <img :src="'/storage/user_photo/'+user.photo">
                  </v-avatar>
                  <a id="main-menu-button" @click="menu()">{{ user.lastname }} {{ user.firstname }}</a>
               </div>
               <div id="authentication" v-else>
                  <router-link to="/login"><font-awesome-icon icon="sign-in-alt" />Вход</router-link>
                  <router-link to="/register"><font-awesome-icon icon="user-plus" />Регистрация</router-link>
               </div>
            </div>
         </div>
      </div>
      <sidebar :menuActive="menuActive" :authenticated="authenticated" :user="user"></sidebar>

   </div>
</template>


<script>
import sidebar from './Sidebar';


import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEnvelopeOpenText, faPhoneSquareAlt, faSignInAlt, faUserPlus, faSignOutAlt } from '@fortawesome/free-solid-svg-icons'
import { faInstagram, faFacebook } from '@fortawesome/free-brands-svg-icons'

library.add(faEnvelopeOpenText, faPhoneSquareAlt, faInstagram, faFacebook, faSignInAlt, faUserPlus, faSignOutAlt)

Vue.component('font-awesome-icon', FontAwesomeIcon)

export default {
   data() {
      return {
         authenticated: auth.check(),
         user: auth.user,
         menuActive:false
      }
   },

   methods: {

      menu(){
         this.menuActive = !this.menuActive;
      },
      
   },

   mounted() {

      Event.$on('userLoggedIn', () => {
         this.authenticated = true;
         this.user = auth.user;
      });

      Event.$on('userLoggedOut', () => {
         this.authenticated = false;
         this.user = auth.user;
      });

   },
   components: {
      sidebar
   },


}

</script>

<style lang="scss" scoped>
.header{
   position: fixed;
   z-index: 40;
   top: 0;
   left: 0;
   width: 100%;
   box-shadow: 0 1px 5px 0 rgba(0,0,0,.1), 0 1px 5px 0 rgba(0,0,0,.1);
   background: #fff;
}
.top-header{
   background: #3A75B8;
   padding: 0 15px;
   height: 34px;
   line-height: 34px;
   display: flex;
   justify-content: space-between;
   a{
      color: #ffffff;
      transition: .3s;
      font-size: 12px;
      &:hover{
         opacity: .9;
      }
   }
   .group-left{
      a{
         margin: 0 10px 0 0;
      }
      svg{
         margin: 0 5px 0 0;
      }
   }
   .group-right{
      a{
         margin: 0 0 0 10px;
      }
   }
}

.bottom-header{
   padding: 0 15px;
   height: 64px;
   display: flex;
   align-items: center;
   justify-content: space-between;
   a{
      color: #303030;
      transition: .3s;
      font-size: 16px;
      cursor: pointer;
      &:hover{
         color: #3A75B8;
      }
   }
   .main-logo{
      img{
         width: 100px;
         height: auto;
      }
   }
   .main-menu{
      display: flex;
      justify-content: space-between;
      li{
         list-style: none;
         a{
            padding: 10px;
            display: block;
            &.router-link-active{
               color: #3A75B8;
            }
         }
      }

   }
   .group-left{
      width: 245px;
   }
   .group-right{
      width: 245px;
      text-align: right;
      a{
         margin: 0 20px 0 0;
         svg{
            margin: 0 5px 0 0;
         }
      }
   }

}

</style>
