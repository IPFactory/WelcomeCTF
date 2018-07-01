<template>
<div id='head'>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 ">
                WelcomeCTF
            </div>
            <div class="col-lg-offset-6 col-sm-offset-6 col-lg-3 col-sm-3 hidden-sm hidden-xs">
                <div id="login">
                    <div class="col-lg-4 col-sm-4" id="btn" style="color:#fff;">
                        <p>Login</p>
                    </div>
                    <div class="col-lg-4 col-sm-4" id="btn" style="color:#1ca1f2;">
                        <p>Twitter</p>
                    </div>
                    <div class="col-lg-4 col-sm-4" id="btn" style="color:#394148;">
                        <p>Github</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div >
</template>

<script>
    export default {
        mounted() {
            console.log('header mounted.')
        }
    }

</script>
