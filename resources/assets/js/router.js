import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode : 'history',
    routes:[
        { path: '/'                 , component:require('./components/Top.vue') },
        { path: '/regist'           , component:require('./components/Regist.vue') },
        { path: '/login'            , component:require('./components/Login.vue') },
        { path: '/social/callback'  , component:require('./components/SocialCallback.vue') },
        { path: '/main'             , component:require('./components/Main.vue') },
        { path: '/main/problem'     , component:require('./components/Problem.vue') },
        { path: '/user'             , component:require('./components/User.vue') },
        { path: '/score'             , component:require('./components/Scoreboard.vue') },
    ],
    scrollBehavior (to , from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    },
})
