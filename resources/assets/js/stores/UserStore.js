import http     from '../service/http.js'
import router 		from "../router";

export default {
    debug: true,
    components: {
        head,
        app,
    },
    state: {
        user: {},
        authenticated: false,
    },
    login (email, password, successCb = null, errorCb = null) {
        var login_param = {email: email, password: password}
        http.post('/login/digest', login_param, res => {
            this.state.user = res.data.user
            this.state.authenticated = true
            successCb()
        }, error => {
            errorCb()
        })
    },

    regist (email, userName, password, password_check, successCb = null, errorCb = null) {
        var regist_param = {email: email, userName: userName, password: password, password_confirmation: password_check}
        http.post('/regist/digest', regist_param, res => {
            this.state.user = res.data.user
            this.state.authenticated = true
            window.authshow          = true
            successCb()
        }, error => {
            errorCb()
        })
    },
    logout (successCb = null, errorCb = null) {
        http.get('logout', res => {
            localStorage.removeItem('jwt-token')
            this.state.authenticated = false
            window.authshow = false
            successCb()
        }, error =>{
            errorCb()
        })
    },

    setCurrentUser (successCb = null, errorCb = null) {
        http.get('me', res => {
            this.state.user = res.data.user
            this.state.authenticated    = true
            window.authshow             = true
            head.$data.show =   window.authshow
            app.$data.show  =   window.authshow
        },error =>{
            this.state.authenticated    = false
            window.authshow             = false
            head.$data.show =   window.authshow
            app.$data.show  =   window.authshow
        })
    },

    /**
    * Init the store.
    */
    init () {
        //if(localStorage.getItem('jwt-token')) {
            this.setCurrentUser()
        //}
    }
}
