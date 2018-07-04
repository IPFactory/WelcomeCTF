<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 " id="title">
                <router-link to="/">WelcomeCTF</router-link>
            </div>
            <div class="col-lg-offset-2 col-sm-offset-2 col-lg-7 col-sm-7 hidden-sm hidden-xs">
                <div id="login">
                    <router-link to="/" class="col-lg-offset-2 col-lg-2 col-sm-2" id="btn" style="color:#394148;">
                        <p>Top</p>
                    </router-link>
                    <router-link to="/main" class="col-lg-2 col-sm-2" id="btn" style="color:#394148;">
                        <p>Problem</p>
                    </router-link>
                    <router-link to="/User" class="col-lg-2 col-sm-2" id="btn" style="color:#394148;">
                        <p>Score</p>
                    </router-link>
                    <router-link to="/author" class="col-lg-2 col-sm-2" id="btn" style="color:#394148;">
                        <p>Author</p>
                    </router-link>
                    <router-link to="/user" class="col-lg-2 col-sm-2" id="btn" style="color:#394148;">
                        <p>User</p>
                    </router-link>
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
