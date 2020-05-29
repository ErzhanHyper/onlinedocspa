<template>
   <div>
      <main-header></main-header>

      <div :class="{ main_content: mainpage }" >
         <router-view></router-view>
      </div>

      <main-footer></main-footer>

   </div>
</template>

<script>


export default {



   data() {
      return {
         authenticated: auth.check(),
         user: auth.user,
         mainpage:false,
      };
   },

   methods:{
      logout() {
         auth.logout();
         if(this.$route.path != '/'){
            this.$router.push('/');
         }
      }
   },

   mounted() {


      if (this.$route.path === '/') {
         this.mainpage = false
      }
      else {
         this.mainpage = true
      }

      Event.$on('userLoggedIn', () => {
         this.authenticated = true;
         this.user = auth.user;
      });

      Event.$on('userLoggedOut', () => {
         this.authenticated = false;
         this.user = auth.user;
      });
   },


   watch: {
      '$route' () {
         if (this.$route.path === '/') {
            this.mainpage = false
         }
         else {
            this.mainpage = true
         }
      }
   },

}
</script>

<style lang="scss" scoped>
.main_content{
   min-height: calc(100vh - 580px);
   padding: 40px 0;
   max-width: 992px;
   margin: 99px auto 0;
}
</style>
