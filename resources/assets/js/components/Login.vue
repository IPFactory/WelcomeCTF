<template>
<div id="login">
    <div class="container">
        <div id="body_band">
            <p><b>Login Your WelcomeCTF Account</b></p>
        </div>
        <div id="message">
            <form>
                <div class="alert alert-danger" role="alert" v-if="showAlert">
                    {{ alertMessage }}
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="email" class="form-control" id="email" placeholder="Email" v-model="email" @keyup.enter="login" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" id="password" placeholder="password" v-model="password" @keyup.enter="login" required autofocus>
                </div>
                <!--<div class="alert alert-danger" role="alert" v-if="showAlert"><strong>{{ alertMessage }}</strong></div>-->
                <div id="login-button" @click="login">
                    <b>LOGIN</b>
                </div>
            </form>
        </div>
    </div>
</div>
</template>


<script>
    import userStore from '../stores/UserStore';
    export default {
        props:["show"],

        data() {
            return {
                notification: "none",
                email       : '',
                password    : '',
                showAlert   : false,
                alertMessage: '',
            }
        },
        methods :{
            login () {
                userStore.login(this.email,this.password,res => {
                    this.$router.push('/')
                    window.authshow = true
                },
                error => {
                    this.showAlert      = true
                    this.alertMessage   = 'EmailまたはPasswordが間違っています。'
                })
            },
        },
    }
</script>
