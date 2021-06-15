require('./bootstrap');

import Vue from 'vue'
import App from './components/App.vue'

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: { App }
});
