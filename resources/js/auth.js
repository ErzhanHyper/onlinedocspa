class Auth {
   constructor() {
      this.token = window.localStorage.getItem('token');

      let userData = window.localStorage.getItem('user');
      this.user = userData ? JSON.parse(userData) : null;

      if (this.token) {
         axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
         this.getUser();
      }

   }

   getUser() {
      if(this.user){
         axios.get('/api/get-user')
         .then(({data}) => {
            this.user = data;
         })
         .catch(({response}) => {
            if (response.status === 401) {
               this.logout();
            }
         });
      }
   }

   login (token, user) {
      window.localStorage.setItem('token', token);
      window.localStorage.setItem('user', JSON.stringify(user));

      axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

      this.token = token;
      this.user = user;

      Event.$emit('userLoggedIn');
   }
   

   logout() {

      axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
      axios.post('/api/logout').then(response => {

         window.localStorage.setItem('token', null);
         window.localStorage.setItem('user', null);

         this.token = null;
         this.user = null;

         Event.$emit('userLoggedOut');
      }).catch(error => {

      });
   }

   check () {
      return !! this.token;
   }


}

export default Auth;
