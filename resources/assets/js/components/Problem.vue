<template>
<div id="ploblem">
    <div class="container">
        <div id="body_band">
            <p id="problem-info">
                <span>Q.{{ problemList.id }} {{ problemList.title }}</span>
                <span id="info">
                    <span>{{ problemList.point }}</span>
                    <span>{{ problemList.category }}</span>
                    <span>{{ problemList.solveCount }}</span>
                    <span>
                        <b v-if=problemList.isSolve>★</b>
                        <b v-else>☆</b>
                    </span>
                </span>
            </p>
        </div>
        <div id="back-list">
            <router-link to="/main"><b>&lt; &lt; problem::list</b></router-link >
        </div>
        <div id="message">

            <div id="data" v-html=problemList.statement></div>
            <label @click="openHint()">Hint!<b v-if="!this.isHintOpen">▼</b><b v-else>:</b></label>
            <div id="hint" v-if="this.isHintOpen">
                <div id="hint-text">
                    {{problemList.hint}}
                </div>
            </div>
            <div v-if=problemList.file1>
            <label>File:</label>
            <div id="file">
                <div id="file-link" >
                    <p>File</p>
                    <a :href='"../ctffiles/"+problemList.file1' target="_blank"></a>
                </div>
                <div id="file-link" v-if=problemList.file2 >
                    <p>File</p>
                    <a :href='"../ctffiles/"+problemList.file2' target="_blank"></a>
                </div>
            </div>
            </div>
            <div id="submit-zone">
                <label>Flag:</label>
                <form>
                    <input type="text" id="problem-flag" name="problemFlag">
                </form>
                <div id="submit-button" @click="solveFlag()">
    				<b>SUBMIT</b>
    			</div>
            </div>
        </div>

    </div>
</div>
</template>
<script>
import http from "../service/http"

export default {
    props:["show"],
    created() {
        console.log('created problem.')
        this.initializationProblem();
        this.getProblemData()
    },
    mounted () {
        this.isAuth()
    },
    updated() {
        this.isAuth ()
    },
    data() {
        return {
            isHintOpen  : false,
            isSolve     : false,
            problemList : [],
        }
    },
    methods : {
        getProblemData () {
            http.get('/problem/'+this.$route.params.id,res => {
                this.problemList = res.data
            });
        },
        openHint () {
            if (!this.isHintOpen) {
                this.isHintOpen = true;
            }else{
                this.isHintOpen = false;
            }
        },
        initializationProblem () {
            this.isHintOpen = false;
            this.isSolve = false;
        },
        solveFlag () {
            this.isSolve = true;
        },
        isAuth () {
            if (!this.show) {
                this.$router.push('/')
            }
        }
    },

}
</script>
