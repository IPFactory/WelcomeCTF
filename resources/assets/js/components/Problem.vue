<template>
<div id="ploblem">
    <div class="container">
        <div id="body_band">
            <p id="problem-info">
                <span>Q.1 tes</span>
                <span id="info">
                    <span>100pt</span>
                    <span>Misc</span>
                    <span>0</span>
                    <span>
                        <b v-if="isSolve">★</b>
                        <b v-else>☆</b>
                    </span>
                </span>
            </p>
        </div>
        <div id="back-list">
            <router-link to="/main"><b>&lt; &lt; problem::list</b></router-link >
        </div>
        <div id="message">
            <p>テストtestてすとテストtestてすとテストtestてすとテストtestてすとテストtest
                <br>てすとテストtestてすとテストtestてすとテストtestてすとテストtestてすとテストtestてすと
                <br>テストtestてすとテストtestてすとテストtestてすとテストtestてすとテストtestてすとテスト
                <br>testてすとテストtestてすと
            </p>
            <label>CODE:</label>
            <div id="code-zone">
                <div>
                    welcomeCTF{Test_tes_te
                        s_tes_tes_tes_tes_tes_tes
                        _tes_test_tesTest_tes_tes_tes_tes
                        _tes_tes_tes_tes_tes_test_tesTest_tes_te
                        s_tes_tes_tes_tes_tes_tes_tes_test_tesTest_te

                        s_tes_tes_tes_tes_tes_tes_tes_tes_test_te
                        sTest_tes_tes_tes_tes_tes_tes_tes_tes_tes_test_tesTest_tes_tes_tes_tes_tes_tes_tes_tes_tes_test_tesTest_tes_tes_tes_tes_tes_tes_tes_tes_tes_test_tesTest_tes_tes_tes_tes_tes_tes_tes_tes_tes_test_tesTest_tes_tes_tes_tes_tes_tes_tes_tes_tes_test_tes}
                </div>
            </div>
            <label @click="openHint()">Hint!<b v-if="!this.isHintOpen">▼</b><b v-else>:</b></label>
            <div id="hint" v-if="this.isHintOpen">
                <div id="hint-text">
                    テストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト
                </div>
            </div>
            <label>File:</label>
            <div id="file">
                <div id="file-link">
                    <p>File</p>
                    <a href="./" target="_blank"></a>
                </div>
                <div id="file-link">
                    <p>File</p>
                    <a href="./" target="_blank"></a>
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
export default {
    props:["show"],
    created() {
        console.log('created problem.')
        this.initializationProblem();
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
        }
    },
    methods : {
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
