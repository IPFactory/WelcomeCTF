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
                    <a :href='"/file/"+problemList.file1'></a>
                </div>
                <div id="file-link" v-if=problemList.file2 >
                    <p>File</p>
                    <a :href='"/file/"+problemList.file2'></a>
                </div>
            </div>
            </div>
            <div id="submit-info" v-if="problemList.isSolve||this.isSolve">
                <div>Congratulations!!</div>
            </div>
            <div id="submit-zone">
                <label>Flag:</label>
                <input type="text" id="problem-flag" name="problemFlag" v-model='problemFlag' placeholder="welcomeCTF{xxxxxxxXXXXXX}" @keyup.enter='solveFlag' required autofocus>
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
import userStore from '../stores/UserStore';

export default {
    props:["show"],
    created() {
        console.log('created problem.')
        this.initializationProblem();
        this.getProblemData();
    },
    updated() {
        this.isAuth ()
    },
    data() {
        return {
            isHintOpen  : false,
            isSolve     : false,
            problemList : [],
            problemFlag : '',
        }
    },
    methods : {
        getProblemData () {
            http.get('/problem/info/'+this.$route.params.id,res => {
                this.problemList = res.data[0]
                console.log(res.data[0]);
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
            userStore.solved(this.problemFlag, this.$route.params.id,res => {
                this.isSolve = true;
            },error => {});
        },
        isAuth () {
            if (!this.show) {
                this.$router.push('/')
            }
        }
    },

}
</script>
