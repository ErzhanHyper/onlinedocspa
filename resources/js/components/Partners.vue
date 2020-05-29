<template>
   <div class="partners">

      <h2 class="text-center">Наши партнеры</h2>
      <br>
      <carousel :items="2">
         <div><img src="/img/partners/logo2.png"></div>
         <div><img src="/img/partners/logo3.png"></div>
      </carousel>

   </div>
</template>


<script>

import carousel from 'vue-owl-carousel'

export default {
   components: { carousel },
}

</script>


<style lang="scss">

.partners {
   margin-bottom: 60px;
   .owl-carousel {
      .owl-stage{
         width: 520px!important;
         margin: 0 auto;
      }
      .owl-item{
         width: 200px!important;
         margin: 0 30px;
      }
   }
}

</style>
