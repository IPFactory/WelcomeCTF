<template>
<div id="regist">
    <div class="container">
        <div id="body_band">
            <p><b>Regist Your WelcomeCTF Account</b></p>
        </div>
        <div id="message">
            <div class="alert alert-danger" role="alert" v-if="showAlert"><strong>{{ alertMessage }}</strong></div>
            <form>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="email" class="form-control" id="email" placeholder="Email" v-model="email" @keyup.enter="regist" required autofocus>
                </div>
                <div class="form-group">
                    <label for="userName">User Name : </label>
                    <input type="text" class="form-control" id="userName" placeholder="Use Name" v-model="userName" @keyup.enter="regist" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" id="password" placeholder="password" v-model="password" @keyup.enter="regist" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">One more : </label>
                    <input type="password" class="form-control" id="password_check" placeholder="password" v-model="password_check" @keyup.enter="regist" required autofocus>
                </div>
            </form>
            <div id="login-button" @click="regist">
                <b>Regist</b>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import userStore from '../stores/UserStore';
import http      from '../service/http';
export default {
    mounted() {
        console.log('login component mounted.');
        //this.fetchUsers();
    },
    data() {
        return {
            notification: "none",
            email       : '',
            userName    : '',
            password    : '',
            password_check: '',
            showAlert   : false,
            alertMessage: '',
        }
    },
    methods :{
        regist () {
            userStore.regist(this.email, this.userName, this.password, this.password_check, res => {
                this.$router.push('/')
            },
            error => {
                this.showAlert      = true
                this.alertMessage   = 'データ入力が間違っています'
            })
        }
    },
}
</script>
