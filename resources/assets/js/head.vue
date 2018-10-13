<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 " id="title">
                <router-link to="/">WelcomeCTF</router-link>
            </div>
            <div v-if="!show"  class="col-lg-offset-6 col-sm-offset-6 col-lg-3 col-sm-3 hidden-sm hidden-xs">
                <div id="login">
                    <router-link to="/login" class="col-lg-4 col-sm-4" id="btn" style="color:#fff;">
                        <p>Login</p>
                    </router-link>
                    <router-link to="/regist" class="col-lg-4 col-sm-4" id="btn" style="color:#1ca1f2;">
                        <p>Regist</p>
                    </router-link>
                    <router-link to="/" class="col-lg-4 col-sm-4" id="btn" style="color:#394148;" v-if=false>
                        <p>GitHub</p>
                    </router-link>
                </div>
            </div>
            <div v-if="show"  class="col-lg-offset-2 col-md-offset-2 col-sm-offset-8 col-xs-offset-8 col-lg-7 col-md-7 col-sm-1 col-xs-1">
                <div id="login" class="hidden-sm hidden-xs">
                    <router-link to="/" class="col-lg-offset-2 col-md-offset-2 col-lg-2 col-md-2" id="btn" style="color:#394148;">
                        <p>Top</p>
                    </router-link>
                    <router-link to="/main" class="col-lg-2 col-md-2" id="btn" style="color:#394148;">
                        <p>Problem</p>
                    </router-link>
                    <router-link to="/score" class="col-lg-2 col-md-2" id="btn" style="color:#394148;">
                        <p>Score</p>
                    </router-link>
                    <router-link to="/user" class="col-lg-2 col-md-2" id="btn" style="color:#394148;">
                        <p>User</p>
                    </router-link>
                    <a @click="logout()" class="col-lg-2 col-md-2" id="btn" style="color:#394148;">
                        <p>Logout</p>
                    </a>
                </div>
                <div id="nav-drawer" class="hidden-lg hidden-md">
                    <input id="nav-input" type="checkbox" class="nav-unshown text-left">
                    <label id="nav-open" for="nav-input" class="text-left"><span></span></label>
                    <label class="nav-unshown text-left" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                        <router-link to="/" class="col-sm-12 col-xs-12" id="btn" style="color:#394148;">
                            <p>Top</p>
                        </router-link>
                        <router-link to="/main" class="col-sm-12 col-xs-12" id="btn" style="color:#394148;">
                            <p>Problem</p>
                        </router-link>
                        <router-link to="/User" class="col-sm-12 col-xs-12" id="btn" style="color:#394148;">
                            <p>Score</p>
                        </router-link>
                        <router-link to="/user" class="col-sm-12 col-xs-12" id="btn" style="color:#394148;">
                            <p>User</p>
                        </router-link>
                        <a @click="logout()" class="col-sm-12 col-xs-12" id="btn" style="color:#394148;">
                            <p>Logout</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import userStore from './stores/UserStore'

export default {
    props:["show"],
    data (){
      return {
        userState: userStore.state,
      }
    },
    methods: {
        logout      : function () {
            userStore.logout(
                res => {
                    window.location.replace("/")
                    window.location.reload() ;
                },
                error =>{}
            )
        }
    },


}
</script>
