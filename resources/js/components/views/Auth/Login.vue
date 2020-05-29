<!-- <template>
<div>
<h1>Login</h1>

<p>
<label for="username">Email</label>

<input type="text" name="username" v-model="username">
</p>

<p>
<label for="password">Password</label>

<input type="password" name="password" v-model="password">
</p>

<button @click="login">Login</button>
</div>
</template> -->

<template >

   <div v-if="authenticated && user">
      Вы авторизованы
   </div>
   <div v-else class="d-flex justify-center">
      <form class="col-md-4">
         <v-text-field
         v-model="username"
         label="Email"
         required
         ></v-text-field>

         <v-text-field
         v-model="password"
         :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
         :type="show1 ? 'text' : 'password'"
         name="input-10-1"
         label="Пароль"
         counter
         @click:append="show1 = !show1"
         ></v-text-field>
         <br>
         <v-btn class="mr-4 primary" @click="login">submit</v-btn>

      </form>
   </div>

</template>


<script>
export default {
   data() {
      return {
         username: '',
         password: '',
         show1: false,
         authenticated: auth.check(),
         user: auth.user
      };
   },

   methods: {
      login() {
         let data = {
            username: this.username,
            password: this.password
         };

         axios.post('/api/login', data)
         .then(({data}) => {
            auth.login(data.token, data.user);
            this.$router.push('/dashboard');
         })
         .catch(({response}) => {
            alert(response.data.message);
         });
      },
   }
}
</script>
