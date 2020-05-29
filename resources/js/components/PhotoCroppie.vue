<template>
   <div>

      <img :src="defaultImage" style="width: 60px; height: 60px;" class="profile_photo">
      <VueImageUploadCroppie :defaultImage.sync="defaultImage" :trans="photoTrans" :width="220" :height="220" circle></VueImageUploadCroppie>

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
         defaultImage: '',
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
