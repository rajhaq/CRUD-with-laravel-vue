
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
let AppLayout= require('./components/App.vue');

const Itemadd=Vue.component('Itemadd', require('./components/Itemadd.vue'));
const Itemlist=Vue.component('Itemlist', require('./components/Itemlist.vue'));
const Itemedit=Vue.component('Itemedit', require('./components/Itemedit.vue'));

Vue.use(VueRouter,VueAxios,axios);

const routes=[
    {
        name:'Itemlist',
        path: '/',
        component: Itemlist
    },
    {
        name:'Itemadd',
        path: '/add',
        component: Itemadd
    },
    {
        name:'Itemedit',
        path: '/edit/:id',
        component: Itemedit
    },
];

const router = new VueRouter({ mode: 'history', routes: routes});

new Vue(
 Vue.util.extend(
    { router },
    AppLayout
 )
).$mount('#app');

