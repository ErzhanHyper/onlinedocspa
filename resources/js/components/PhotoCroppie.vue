<template>
   <div>

      <img :src="defaultImage" style="width: 180px; height: 180px;" class="profile_photo">
      <VueImageUploadCroppie :defaultImage.sync="defaultImage" :trans="photoTrans" :width="220" :height="220" circle></VueImageUploadCroppie>
      <a>Требование к фото</a>
   </div>
</template>

<script>
import VueImageUploadCroppie from 'vue-image-upload-croppie'

export default {
   components: {
      VueImageUploadCroppie
   },

   props: ['photoData'],

   data() {
      return {
         defaultImage: '/img/logo1.png',
         photoTrans: {
            cropImage: 'Фото профиля',
            chooseImage:'Загрузить фото',
            confirmCutting: 'Завершить'
         },
      };
   },


   watch: {
      defaultImage: function(data) {
         if (data) {
            this.$emit('updateParent', {
               photoData:  data,
            })
         }
      }
   },

}


</script>

<style lang="scss">
button.btn.vodal-confirm-btn{
   width: 160px;
   margin: 0;
}
</style>
