import VueRouter from 'vue-router';

let routes = [
   {
      path: '/',
      component: require('./components/views/pages/main/Home.vue').default
   },

   {
      path: '/contacts',
      component: require('./components/views/pages/Contact.vue').default,
   },

   {
      path: '/profile',
      component: require('./components/views/pages/profile/Profile.vue').default,
   },

   {
      path: '/online_consultations',
      component: require('./components/views/pages/consultations/online/Index.vue').default,
   },

   {
      path: '/calendar',
      component: require('./components/Calendar.vue').default,
   },

   {
      path: '/about',
      component: require('./components/views/pages/About.vue').default,
   },

   {
      path: '/doctors',
      component: require('./components/views/pages/doctors/Index.vue').default,
   },

   {
      path: '/login',
      component: require('./components/views/Auth/Login.vue').default,
   },
   {
      path: '/register',
      component: require('./components/views/Auth/Register.vue').default,
   },


   {
      path: '/admin/dashboard',
      component: require('./components/views/admin/Dashboard.vue').default,
   },

];

const router = new VueRouter({
   routes
});

router.beforeEach((to, from, next) => {

   if (to.matched.some(record => record.meta.middlewareAuth)) {
      if (!auth.check()) {
         next({
            path: '/login',
            query: { redirect: to.fullPath }
         });
         return;
      }
   }

   next();
})

export default router;
