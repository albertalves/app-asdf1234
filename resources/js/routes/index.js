import Vue from 'vue';
import VueRouter from 'vue-router';


import HomeComponent from '../components/HomeComponent';
import ProductsComponent from '../components/product/ProductComponent';


Vue.use(VueRouter);

const routes = [
    {
        path: '/', 
        component: HomeComponent,
        children: [
            {
                path: '/home',
                component: ProductsComponent,
                name: 'home'
            },
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;