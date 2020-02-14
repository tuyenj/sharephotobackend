import Vue from 'vue';
import {mapGetters} from 'vuex';

export default function ({$axios, store, redirect}) {
  $axios.setToken('access_token');

  $axios.onResponse(config => {
    $axios.setHeader('Access-Control-Allow-Origin', 'https://localhost/api')
  });
  $axios.onError(error => {
    if (typeof error['response'] !== 'undefined' && typeof error.response['status'] !== 'undefined' && error.response.status === 422) {
      store.dispatch("validation/setErrors", error.response.data.errors);
    }
    if (error.response.status === 401) {
      store.dispatch("validation/setErrors", error.response.data.errors);
    }
    if (error.response.status === 500) {
      redirect('/errors/system-error');
    }
    return Promise.reject(error);
  });
  $axios.onRequest(() => {
    store.dispatch("validation/clearErrors");
  });

  const validation = {
    install(Vue, options) {
      Vue.mixin({
        computed: {
          ...mapGetters({
            errors: "validation/errors"
          })
        }
      })
    }
  };
  Vue.use(validation);
}
