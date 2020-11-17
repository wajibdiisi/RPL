/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp, h } from 'vue'
import { App, plugin } from '@inertiajs/inertia-vue3'
import BootstrapVue from 'bootstrap-vue' //Importing
window.Vue = require('vue');
const el = document.getElementById('app')
createApp({
    render: () => h(App, {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    })
  }).use(plugin).mount(el)
Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('flashy', require('./vendor/devmi/Flashy.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('welcome', require('./components/Welcome.vue'));


const checkbox = new Vue({
    el:'#checkbox',
    data: {
        genres: []
    },
    template :''
})
const rating = new Vue({
  el: '#rating',
  data() {
    return {
      value: null
    }
  },
  template :''
})