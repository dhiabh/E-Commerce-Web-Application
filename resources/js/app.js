/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import { routes } from "./routes";
import axios from 'axios';

Vue.use(VueRouter);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('articles-index', require('./components/articles/index.vue').default);
Vue.component('panier-index', require('./components/panier/index.vue').default);
Vue.component('count-articles', require('./components/countArticles_Panier.vue').default);

Vue.use(Vuex);
const store = new Vuex.Store({
    state: {
        count: 0
    },

    mutations: {
        getPanierCountFromDB(state) {
            axios.get('/panier-count')
                .then((response) => {
                    state.count = response.data;
                });
        },
        increment(state) {
            state.count++;
        },

        decrement(state) {
            state.count--;
        },

        
    }
});
    

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode : 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    store: store
});

const app2 = new Vue({
    el: '#app2',
    router: router,
    store: store
});

