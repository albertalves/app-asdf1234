import Vue from 'vue';
import Vuex from 'vuex';

import preloader from './common/preloader';
import product from './product';
import history from './history';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        preloader,
        product,
        history,
    }
});

export default store;