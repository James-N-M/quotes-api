import Vue from 'vue';
import axios from 'axios';
import VModal from 'vue-js-modal'

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.component('quote-search-page', require('./components/QuoteSearchPage.vue').default);
Vue.component('home-page', require('./components/Home.vue').default);

Vue.use(VModal, { dialog: true })

let app = new Vue({
    el: '#app',
});
