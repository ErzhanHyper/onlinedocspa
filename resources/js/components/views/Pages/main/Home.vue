<template>
   <div>
      <mainSlider></mainSlider>
      <v-container>
         <service></service>
         <partners></partners>
      </v-container>
   </div>
</template>

<script>

import mainSlider from './Slider';
import service from '../../../Service';
import partners from '../../../Partners';

export default {
   components: {
      mainSlider,
      service,
      partners,
   }
}

</script>
