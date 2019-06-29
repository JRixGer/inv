
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.devtools = false;

Vue.component('skuslist', require('./components/SkuMaintain.vue'));
Vue.component('rawlist', require('./components/InsRaw.vue'));
Vue.component('reorderlist', require('./components/ReOrder.vue'));
Vue.component('marolist', require('./components/MaroPost.vue'));
Vue.component('shopifylist', require('./components/ShopifyComponent.vue'));

const app = new Vue({
    el: '#app'
});

