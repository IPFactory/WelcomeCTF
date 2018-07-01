import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode : 'history',
    routes:[
        { path: '/'     , component:require('./components/Top.vue') },
        { path: '/main'  , component:require('./components/Main.vue') },
        { path: '/user' , component:require('./components/User.vue') },
    ],
    scrollBehavior (to , from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    },
})
