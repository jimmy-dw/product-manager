import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App.vue'
import Product from './components/Product.vue'
import Categories from './components/Categories.vue'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {path: '/', component: Categories },
        {path: '/products/:id', component: Product }
    ],
    mode: 'history'
});
