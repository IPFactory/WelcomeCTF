/*===import===*/
import Vue 			from "vue";
import VueRouter 	from "vue-router";
import router 		from "./router";
import http     	from './service/http'

require('./bootstrap')
require('bootstrap-sass')

window.axios = require('axios');

/*===component===*/

Vue.component('vuehead', require('./head.vue'));
Vue.component('vueheadauth', require('./head_auth.vue'));
Vue.component('vuebody', require('./app.vue'));
Vue.component('vuefoot', require('./foot.vue'));

/*===component on parts===*/
/*===header===*/
const head = new Vue({
    router,
    el: '#head',
    data : {
        show : true,
    },
    methods :{
        changeShow : function () {
            if (this.show) {
                this.show = false;
            }else{
                this.show = true;
            }
        }
    }
})
/*===body===*/
const app = new Vue({
    router,
    el: '#app',
    create () {
        http.init()
    },
    render: h => h(require('./app.vue')),
})
/*===footer===*/
const foot = new Vue({
    router,
    el: '#foot',
    render: h => h(require('./foot.vue')),
})
/*===window setting===*/
window.head = head;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
