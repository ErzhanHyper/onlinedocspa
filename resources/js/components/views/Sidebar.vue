<template>

   <div>
      <div class="sidebar" v-if="authenticated && user" :class="{ active: menuActive }">
         <ul class="parent-menu">
            <li><router-link to='/profile'><span>Профиль</span></router-link></li>
            <li><router-link to='online_consultations'><span>Мои консультации</span></router-link>
               <!-- <ul class="child-menu">
               <li class='has-sub'><a href='#'><span>item 1</span></a></li>
               <li class='has-sub'><a href='#'><span>item 2</span></a></li>
            </ul> -->
         </li>
         <li><a href='#'><span>Мои приемы</span></a></li>
         <li><a href='#'><span>Медицинский сервис</span></a></li>
         <li><a href='#'><span>Расшифровка анализов</span></a></li>
         <li><a href='#'><span>Мои пациенты</span></a></li>
         <li><a href='#'><span>Мои платежи</span></a></li>
         <li><a href='#'><span>Обучение</span></a></li>
         <li><a href='#'><span>Проверка связи</span></a></li>
         <li><a href="#" v-on:click.prevent="logout"><font-awesome-icon icon="sign-out-alt" /><span>Выйти</span></a></li>
      </ul>
   </div>
</div>

</template>

<script>

export default {
   props:['menuActive', 'authenticated', 'user'],
   data(){
      return{

      }
   },

   methods:{
      logout() {
         auth.logout();
         if(this.$route.path != '/'){
            this.$router.push('/');
         }
      }
   },

}

</script>

<style lang="scss" scoped>

.sidebar{
   position: fixed;
   top: 98px;
   width: 260px;
   padding: 20px 0;
   height: calc(100vh - 98px);
   box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
   background: #fff;
   z-index: 30;
   text-align: left;
   right: -300px;
   transition: .4s;
   opacity: 0;
   visibility: hidden;
   transform: rotateY(160deg);
   &.active{
      right: 0;
      transform: rotateY(0);
      visibility: visible;
      opacity: 1;
   }
   li{
      list-style: none;
      a{
         svg{
            margin-right: 5px;
         }
      }
   }
   ul.child-menu{
      li{
         a span{
            padding-left: 15px;
            font-size: 14px;
         }
         ul.child-menu{
            a span{
               font-size: 13px;
               padding-left: 30px;
            }
         }
      }
   }
   a {
      display: block;
      width: calc(100% - 40px);
      padding: 8px 20px;
      transition: .2s;
      &:hover{
         background: #3A75B8;
         span{color: #fff;}
      }
      span{
         color: #303030;
         font-size: 16px;
      }
   }
}

</style>
