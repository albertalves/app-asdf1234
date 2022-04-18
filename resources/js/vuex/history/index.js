const URL_BASE = 'http://localhost:8001/api';

export default {
    actions: {
        createHistory(context, params) {
            context.commit('CHANGE_PRELOADER', true);

            return new Promise((resolve, reject) => {
                axios.post(URL_BASE + '/history', params)
                        .then(response => resolve(response.data))
                        .catch(error => reject(error))
                        .finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },
    }

}
