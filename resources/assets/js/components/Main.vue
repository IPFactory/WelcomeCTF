<template>
<div id="main">
    <div class="container">
        <div id="body_band">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('MISC')" >MISC</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('PPC')" >PPC</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('CRYPT')" >CRYPT</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('WEB')">WEB</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('BIN')">BIN</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('PWN')">PWN</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('NET')">NET</a>
                <a id="btn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3" @click="getProblemsCate('FOR')">FOR</a>
            </div>
        </div>
        <div id="message" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div id="problem-zone" class="col-lg-offset-1 col-lg-10">
                <div id="problem-tile" class="col-lg-3" v-for="problem in problems">
                    <transition name="fade">
                    <router-link :to='"/main/problem/"+problem.id' id="is-problem-solve" v-if=problem.isSolve>
                        <div id="problem-info" >
                            <div id="problem-title">
                                <p><b>{{problem.title}}</b></p>
                            </div>
                            <div id="problem-category">
                                <p><b>{{problem.category}}</b></p>
                            </div>
                            <div id="problem-point">
                                <p><b>{{problem.point}}</b></p>
                            </div>
                        </div>
                    </router-link>

                    <router-link :to='"/main/problem/"+problem.id' id="problem" v-if=!problem.isSolve>
                        <div id="problem-info" >
                            <div id="problem-title">
                                <p><b>{{problem.title}}</b></p>
                            </div>
                            <div id="problem-category">
                                <p><b>{{problem.category}}</b></p>
                            </div>
                            <div id="problem-point">
                                <p><b>{{problem.point}}</b></p>
                            </div>
                        </div>
                    </router-link>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    import http from '../service/http'
    export default {
        props:["show"],
        created () {
            this.getProblems()
        },
        mounted () {
            this.isAuth ()
        },
        data () {
            return {
                problems : [],
            }
        },
        methods :{
            isAuth () {
                if (!this.show) {
                    this.$router.push('/')
                }
            },
            getProblems () {
                http.get('/problem/all',res => {
                    this.problems = res.data
                })
            },
            getProblemsCate (cate) {
                http.get('/problem/'+cate,res => {
                    this.problems = res.data
                })
            },
        },
    }
</script>
