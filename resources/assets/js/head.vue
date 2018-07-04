<template>
<div id="head">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 " id="title">
                <router-link to="/">WelcomeCTF</router-link>
            </div>
            <div class="col-lg-offset-6 col-sm-offset-6 col-lg-3 col-sm-3 hidden-sm hidden-xs">
                <div id="login">
                    <router-link to="/login" class="col-lg-4 col-sm-4" id="btn" style="color:#fff;">
                        <p>Login</p>
                    </router-link>
                    <router-link to="/" class="col-lg-4 col-sm-4" id="btn" style="color:#1ca1f2;">
                        <p>Twitter</p>
                    </router-link>
                    <router-link to="/" class="col-lg-4 col-sm-4" id="btn" style="color:#394148;">
                        <p>GitHub</p>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
        console.log('header mounted.')
    }
}
</script>
