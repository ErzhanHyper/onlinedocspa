<template>
   <div>

      <v-row class="text-center" >
         <h2 style="margin: 0 auto;" v-if="select_user == true">Регистрироваться как?</h2>
         <h2 style="margin: 0 auto;" v-else>Регистрация</h2>
      </v-row>

      <br>

      <v-btn class="ma-2" color="orange darken-2" dark v-if="select_user == false" @click="goBack()">
         <v-icon dark left>mdi-arrow-left</v-icon>Назад
      </v-btn>

      <hr v-if="select_user == false">

      <v-row class="select_user_type" v-if="select_user == true">
         <v-col cols="6" offset="3" class="d-flex justify-space-between" >
            <v-btn
            :class="{active: activeBtn === 'btn1' }"
            @click="showReg('doctor'), activeBtn = 'btn1'"
            color="#3A75B8"
            class=" white--text"
            x-large
            height="60"
            width="140"
            :elevation="1"
            >
            Врач
            <v-icon right dark>mdi-doctor</v-icon>
         </v-btn>

         <v-btn
         @click="showReg('patient'), activeBtn = 'btn2'"
         color="#3A75B8"
         :class="{active: activeBtn === 'btn2' }"
         class=" white--text"
         x-large
         height="60"
         width="140"
         :elevation="1"
         >
         Пациент
         <v-icon right dark>mdi-account-box</v-icon>
      </v-btn>


      <v-btn
      @click="showReg('patient'), activeBtn = 'btn3'"
      color="#3A75B8"
      :class="{active: activeBtn === 'btn3' }"
      class=" white--text"
      x-large
      height="60"
      width="140"
      :elevation="1"
      >
      Клиника
      <v-icon right dark>mdi-account-box</v-icon>
   </v-btn>


   </v-col>
</v-row>



<v-row>
   <doctorReg v-if="doctorRegShow"></doctorReg>
   <patientReg v-if="patientRegShow"></patientReg>

</v-row>
<!-- <v-tabs v-model="tab" background-color="#3A75B8" centered dark icons-and-text>
<v-tabs-slider></v-tabs-slider>

<v-tab href="#tab-1">
Врач
<v-icon>mdi-doctor</v-icon>
</v-tab>

<v-tab href="#tab-2">
Пациент
<v-icon>mdi-account-box</v-icon>
</v-tab>

</v-tabs>

<v-tabs-items v-model="tab" >

<v-tab-item :value="'tab-1'" v-if="doctor">
<v-card flat>
<doctorReg></doctorReg>
</v-card>
</v-tab-item>


<v-tab-item :value="'tab-2'" v-if="patient">
<v-card flat>
<patientReg></patientReg>
</v-card>
</v-tab-item>

</v-tabs-items> -->



</div>
</template>

<script>

import doctorReg from './DoctorReg';
import patientReg from './PatientReg';


export default {
   components: {
      doctorReg,
      patientReg
   },

   data() {
      return {
         tab: null,
         doctorRegShow: false,
         patientRegShow: false,
         activeBtn: '',
         select_user: true,
      };
   },

   methods:{

      goBack(){
         this.select_user = true
         this.doctorRegShow = false
         this.patientRegShow = false
      },

      showReg(data) {
         this.select_user = false;
         if(data == 'doctor'){
            this.doctorRegShow = true
            this.patientRegShow = false
         }else{
            this.patientRegShow = true
            this.doctorRegShow = false
         }
      }
   },

}

</script>


<style lang="scss" scoped>
hr{
   height: 2px;
   background: red;
   width: 100%;
   clear: both;
}
.select_user_type{
   button{
      opacity: .8;
   }

   button.active{
      opacity: 1;
   }
}
</style>
