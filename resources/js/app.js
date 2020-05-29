// require('./bootstrap');

import router from './routes.js'
import VueRouter from 'vue-router'
import Auth from './auth.js'
import 'vuetify/dist/vuetify.min.css'

import Vuetify from 'vuetify'
import Vue from 'vue'
import { validationMixin } from 'vuelidate'
import Vuelidate from 'vuelidate'
import VueChatScroll from 'vue-chat-scroll'
import VueAgile from 'vue-agile'

window.Vue = require('vue');
window._ = require('lodash');
window.axios = require('axios');


Vue.use(Vuelidate)
Vue.use(VueChatScroll);
Vue.use(Vuetify)
Vue.use(VueRouter);
Vue.use(VueAgile);


const opts = {}
export default new Vuetify(opts)
window.auth = new Auth();
window.Event = new Vue;

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('layout', require('./components/views/Layout.vue').default);
Vue.component('main-header', require('./components/views/Header.vue').default);
Vue.component('main-footer', require('./components/views/Footer.vue').default);


Vue.component('admin', require('./components/views/admin/Admin.vue').default);

// Vue.component('passport-clients',require('./components/passport/Clients.vue').default);
// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );
// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

const app = new Vue({
   el: '#app',
   router,
   vuetify: new Vuetify(),
   mixins: [validationMixin],
});
