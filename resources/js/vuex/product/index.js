const URL_BASE = 'http://localhost:8001/api';

export default {
    actions: {
        getProducts(context, params) {
            context.commit('CHANGE_PRELOADER', true);

            return new Promise((resolve, reject) => {
                axios.get(URL_BASE + '/product', {params})
                        .then(response => resolve(response.data))
                        .catch(error => reject(error))
                        .finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },
        updateProduct(context, params) {
            context.commit('CHANGE_PRELOADER', true);

            return new Promise((resolve, reject) => {
                axios.put(URL_BASE + '/product/' + params.sku, {params})
                        .then(response => resolve(response.data))
                        .catch(error => reject(error))
                        .finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },
        createProduct(context, params) {
            context.commit('CHANGE_PRELOADER', true);

            return new Promise((resolve, reject) => {
                axios.post(URL_BASE + '/product', params)
                    .then(response => resolve(response.data))
                    .catch(error => reject(error))
                    .finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },
    }

}
