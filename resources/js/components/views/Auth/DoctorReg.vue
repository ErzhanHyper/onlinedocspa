<template>
   <div>


      <v-container>
         <v-row>

            <v-col cols="12" class="text-left">
               <h2>Врач</h2>
            </v-col>

            <v-col cols="12" sm="4" md="4">
               <v-text-field
               v-model="lastname"
               label="LastName"
               :error-messages="lastnameErrors"
               @input="$v.lastname.$touch()"
               @blur="$v.lastname.$touch()"
               ></v-text-field>
            </v-col>
            <v-col cols="12" sm="4" md="4">
               <v-text-field v-model="firstname" label="FirstName"></v-text-field>
            </v-col>
            <v-col cols="12" sm="4" md="4">
               <v-text-field v-model="middlename" label="MiddleName"></v-text-field>
            </v-col>


            <v-col cols="12" sm="4" md="4">
               <v-text-field
               :error-messages="uemailErrors"
               v-model="uemail"
               label="E-mail"
               required
               @input="$v.uemail.$touch()"
               @blur="$v.uemail.$touch()"
               ></v-text-field>
            </v-col>

            <v-col cols="12" sm="4" md="4">
               <v-text-field
               v-model="password"
               :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
               :type="show1 ? 'text' : 'password'"
               name="input-10-1"
               label="Пароль"
               counter
               @click:append="show1 = !show1"
               ></v-text-field>
            </v-col>

            <!-- <v-col cols="12" sm="4" md="4" >
            <v-file-input
            :rules="rules"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Avatar"
            ></v-file-input> -->



         </v-col>


         <v-col cols="12" sm="4" md="4">
            <ProfilePhoto :photoData="photo" @updateParent="onUpdatePhoto"></ProfilePhoto>
         </v-col>
      </v-row>

      <hr>

      <v-row>
         <v-col cols="12" sm="4" md="4" >
            <v-autocomplete
            v-model="city"
            label="Город"
            :items="cities"
            item-text="name"
            item-value="id"
            v-on:change="changeCity(city)"
            required
            ></v-autocomplete>
         </v-col>

         <v-col cols="12" sm="4" md="4" >
            <v-autocomplete
            v-model="clinic"
            label="Клиника"
            :items="clinics"
            item-text="name"
            item-value="id"
            required
            ></v-autocomplete>
         </v-col>



      </v-row>

      <v-row>

         <v-col cols="12" sm="4" md="4">
            <v-autocomplete
            v-model="specialization"
            label="Специальность"
            :items="specializations"
            item-text="name"
            item-value="id"
            required
            ></v-autocomplete>
         </v-col>

         <v-col cols="12" sm="4" md="4">
            <v-autocomplete
            v-model="qualification"
            label="Квалификация"
            :items="qualifications"
            item-text="name"
            item-value="id"
            required
            ></v-autocomplete>
         </v-col>

         <v-col cols="12" sm="4" md="4">
            <v-autocomplete
            v-model="category"
            label="Категория"
            :items="categories"
            item-text="name"
            item-value="id"
            required
            ></v-autocomplete>
         </v-col>


      </v-row>

      <hr>


      <v-col cols="12">
         <v-checkbox
         v-model="checkbox"
         label="Do you agree?"
         ></v-checkbox>
      </v-col>


      <v-btn class="mr-4" @click="register">Зарегистрироваться</v-btn>
   </v-container>



</div>
</template>

<script>
import { required, maxLength, email} from 'vuelidate/lib/validators'

import ProfilePhoto from '../../PhotoCroppie';

export default {
   components: {
      ProfilePhoto,
   },

   data() {
      return {
         utype: 'doctor',
         firstname: '',
         lastname: '',
         middlename: '',

         uemail: '',
         password: '',

         select: '',
         checkbox: '',
         show1: false,
         city: '',
         cities: [],

         specialization: '',
         specializations: [],

         qualification: '',
         qualifications: [],

         category: '',
         categories: [],


         clinics: [],
         clinic: '',

         photo: '',
         selectedClinic: '',
         // defaultImage: '',
         // photoTrans: {
         //    cropImage: 'Фото профиля',
         //    chooseImage:'Загрузить фото',
         //    confirmCutting: 'Завершить'
         // },
      };
   },


   validations: {
      uemail: { required, email },
      lastname: { required, maxLength: maxLength(25) },
   },




   computed: {
      uemailErrors () {
         const errors = []
         if (!this.$v.uemail.$dirty) return errors
         !this.$v.uemail.email && errors.push('Must be valid e-mail')
         !this.$v.uemail.required && errors.push('E-mail is required')
         return errors
      },

      lastnameErrors () {
         const errors = []
         if (!this.$v.lastname.$dirty) return errors
         !this.$v.lastname.required && errors.push('Lastname is required')
         return errors
      },
   },

   methods: {

      onUpdatePhoto(data) {
         this.photo = data.photoData
      },

      _repairAutocomplete() {
         const el = this.$el
         el.querySelectorAll('input[type="text"][autocomplete="off"').forEach(it => {
            it.setAttribute('autocomplete', 'new-password')
         })
      },

      changeCity(selected) {
         this.selectedClinic = selected;
         let arr = [];
         axios.get('/api/get_clinics').then((response) => {
            response.data.filter(function (v) {
               if(v.city_id == selected){
                  arr.push(v)
               }
            })
         })
         this.clinics = arr;

      },

      register() {
         this.$v.$touch()

         let data = {
            email: this.uemail,
            password: this.password,
            lastname: this.lastname,
            firstname: this.firstname,
            middlename: this.middlename,
            city: this.city,
            utype: this.utype,
            photo: this.photo,
            specialization: this.specialization,
            qualification: this.qualification,
            clinic: this.clinic,
            category: this.category,
         };

         axios.post('/api/register', data)
         .then(({data}) => {
            auth.login(data.token, data.user);
            this.$router.push('/');

         })
         .catch(({response}) => {
            console.log(response);
            // alert(response.data.message);
         });
      },



   },

   mounted() {

      this._repairAutocomplete()

      axios.get('/api/get_cities').then((response) => {
         this.cities = response.data
      })

      axios.get('/api/get_specialization').then((response) => {
         this.specializations = response.data
      })

      axios.get('/api/get_qualification').then((response) => {
         this.qualifications = response.data
      })

      axios.get('/api/get_category').then((response) => {
         this.categories = response.data
      })

   },

   updated(){
      this._repairAutocomplete()
   }

}
</script>

<style lang="scss">

button.btn.vodal-confirm-btn{
   width: 160px;
   margin: 0;
}

.profile_photo{
   float: left;
}

</style>
