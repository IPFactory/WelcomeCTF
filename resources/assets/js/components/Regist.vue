<template>
    <div class="container">
        <div id="body_band">
            <p><b>Regist Your WelcomeCTF Account</b></p>
        </div>
        <div id="message">
            <form>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="userId">UserID : </label>
                    <input type="text" class="form-control" id="user_id" placeholder="Use ID">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="password">One more : </label>
                    <input type="password" class="form-control" id="password_check" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="password">Icon file : </label>
                    <label id="file-button" for="icon">
                        Icon
                        <input type="file" class="form-control" id="icon_file" placeholder="icon_file">
                    </label>
                </div>
                <!--<div class="alert alert-danger" role="alert" v-if="showAlert"><strong>{{ alertMessage }}</strong></div>-->
            </form>
            <div id="login-button" onclick="">
                <b>Regist</b>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log("Component mounted.")
        },
    }
</script>
