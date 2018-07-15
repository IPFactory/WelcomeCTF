/*===import===*/
import Vue 			from "vue";
import VueRouter 	from "vue-router";
import router 		from "./router";
import Http     	from './service/http.js';
import UserStore    from './stores/UserStore';


require('./bootstrap');
require('bootstrap-sass');

window.axios = require('axios');
Http.init()
UserStore.init()
/**/
/*===log===*/

// 各メソッドをwindowへ直接追加して行く
/**
for( var i in methods ){
    console.log(i)
    (function( m ){
        if( console[m] && debugMode ){
            window[m] = function(){ console[m].apply( console, arguments ); };
        }
        // debugModeがfalse,もしくは該当メソッドが存在しない場合は、空のメソッドを用意する
        else{
            window[m] = function(){};
        }
    })
    ( methods[i] );
}
/**/
/*===component===*/

Vue.component('vuehead', require('./head.vue'));
Vue.component('vuebody', require('./app.vue'));
Vue.component('vuefoot', require('./foot.vue'));

/*===component on parts===*/
/*===header===*/
const head = new Vue({
    router,
    el: '#head',
    data : {
        show     : false,
    },
    beforeCreate () {
    },
    created () {
    },
    beforeMount () {
    },
    mounted () {
    },
    beforeUpdate(){
    },
    updated (){
    },
    methods : {
        changeShow : function () {
            this.show = window.authshow
        }
    },
    watch: {
        '$route': function(){
            UserStore.setCurrentUser()
            this.changeShow()
        }
    },
})
/*===body===*/
const app = new Vue({
    router,
    el: '#app',
    beforeCreate () {
    },
    created () {
    },
    beforeMount () {
    },
    mounted () {
    },
    beforeUpdate(){
    },
    updated (){
    },
    beforeDestroy () {
    },
    destroy () {
    },
    data : {
        show    : false,
    },
    methods : {
        changeShow : function () {
            this.show = window.authshow
        }
    },
    watch: {
        '$route': function(){
            this.changeShow()
        }
    },
    //render: h => h(require('./app.vue')),
})
/*===footer===*/
const foot = new Vue({
    router,
    el: '#foot',
    render: h => h(require('./foot.vue')),
})
/*===window setting===*/
window.head = head;
window.app  = app;
window.foot = foot;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

/*===method===*/
