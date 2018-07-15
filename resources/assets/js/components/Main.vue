<template>
<div id="main">
    <div class="container">
        <div id="body_band">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">ALL</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">MISC</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">PPC</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">CRYPT</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">WEB</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">BIN</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">PWN</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">NET</a>
            </div>
        </div>
        <div id="message" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="problem-zone" class="col-lg-offset-1 col-lg-10">

                <div id="problem-tile" class="col-lg-3" >
                    <router-link to="/main/problem" id="is-problem-solve">
                        <div id="problem-info" >
                            <div id="problem-title">
                                <p><b>test-problem</b></p>
                            </div>
                            <div id="problem-category">
                                <p><b>test</b></p>
                            </div>
                            <div id="problem-point">
                                <p><b>999</b></p>
                            </div>
                        </div>
                    </router-link>
                </div>

                <div id="problem-tile" class="col-lg-3" >
                    <router-link to="/main/problem" id="problem">
                        <div id="problem-info" >
                            <div id="problem-title">
                                <p><b>test-problem</b></p>
                            </div>
                            <div id="problem-category">
                                <p><b>test</b></p>
                            </div>
                            <div id="problem-point">
                                <p><b>999</b></p>
                            </div>
                        </div>
                    </router-link>
                </div>

            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        props:["show"],
        mounted () {
            this.isAuth ()
        },
        methods :{
            isAuth () {
                if (!this.show) {
                    this.$router.push('/')
                }
            }
        },
    }
</script>
