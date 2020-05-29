<template>
   <div>


      <v-form>
         <v-row>
            <v-col cols="12" class="text-left">
               <h2>Пациент</h2>
            </v-col>

            <v-col cols="12" sm="4" md="4">
               <v-text-field v-model="lastname" label="LastName" required></v-text-field>
            </v-col>
            <v-col cols="12" sm="4" md="4">
               <v-text-field v-model="firstname" label="FirstName" required></v-text-field>
            </v-col>
            <v-col cols="12" sm="4" md="4">
               <v-text-field v-model="middlename" label="MiddleName" required></v-text-field>
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
         </v-row>

         <v-row no-gutters>
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
         </v-row>

         <v-col cols="12">
            <v-checkbox
            v-model="checkbox"
            label="Do you agree?"
            required
            ></v-checkbox>
         </v-col>


         <v-btn class="mr-4" @click="register">Зарегистрироваться</v-btn>
      </v-form>

   </div>
</template>

<script>
import { required, maxLength, email} from 'vuelidate/lib/validators'


export default {

   data() {
      return {
         utype: 'patient',
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
      };
   },

   validations: {
      uemail: { required, email },
      lastname: { required, maxLength: maxLength(25) },
      firstname: { required, maxLength: maxLength(25) },
      middlename: { required, maxLength: maxLength(25) },
   },

   computed: {
      uemailErrors () {
         const errors = []
         if (!this.$v.uemail.$dirty) return errors
         !this.$v.uemail.email && errors.push('Must be valid e-mail')
         !this.$v.uemail.required && errors.push('E-mail is required')
         return errors
      },
   },

   methods: {

      changeCity(selected) {
         console.log(selected);
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
         };

         axios.post('/api/register', data)
         .then(({data}) => {
            auth.login(data.token, data.user);
            this.$router.push('/');
         })
         .catch(({response}) => {
            // alert(response.data.message);
         });
      },



   },

   mounted() {

      axios.get('/api/get_cities').then((response) => {
         this.cities = response.data
      })


   }

}
</script>
