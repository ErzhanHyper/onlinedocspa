<template>
   <div>

      <v-card color="basil">

         <v-card-title class="text-center justify-center py-6">
            <h2>Профиль</h2>
         </v-card-title>

         <v-tabs v-model="tab" background-color="transparent" color="basil" grow>

         <v-tab v-for="item in items" :key="item">
            {{ item }}
         </v-tab>

      </v-tabs>

      <v-tabs-items v-model="tab" vertical>

         <v-tab-item>
            <v-card flat>
               <main-info></main-info>
            </v-card>
         </v-tab-item>

      </v-tabs-items>

   </v-card>


</div>
</template>


<script>

import mainInfo from './MainInfo';

export default{
   components:{
      mainInfo
   },
   data(){
      return{
         tab: null,
         items: [
            'Общая информация', 'Предоставляемые услуги', 'Документы',
         ],
      }
   }
}
</script>
