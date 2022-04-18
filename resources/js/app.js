require('./bootstrap');

window.Vue = require('vue').default;

import router from './routes';
import store from './vuex';
import vuetify from './vuetify';
import snotify from 'vue-snotify';

const options = {
    toast: {
        showProgressBar: false,
        timeout: 5000
    }
}

Vue.use(snotify, options);

Vue.component('preloader-component', require('./components/common/PreloaderComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify
});