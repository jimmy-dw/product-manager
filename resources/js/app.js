require('./bootstrap');

import Vue from 'vue'
import App from './components/App.vue'
import Product from './components/Product.vue'
import Categories from './components/Categories.vue'
import router from './router'

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: { App, Product, Categories },
    router
});
