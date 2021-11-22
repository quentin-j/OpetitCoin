// on peut importer des dépendances css
import 'reset-css';
import '@fortawesome/fontawesome-free/js/all.js'

import Vue from 'vue'
// vuex
import store from './store'

import router from './routes'

import App from './App.vue'


Vue.config.productionTip = false

new Vue({
    router: router,
    store: store,
    render: h => h(App),
}).$mount('#app')
