<template>
<div id="user">
    <div id="message">
        <div id="user-info">
            <div id="icon">
                <img id="icon-image" :src=myIcon>
            </div>
            <div id="user-name">
                <p>{{ myName }}</p>
            </div>
            <div >
                <p id="info"><span>Rank</span><span>:</span><span>{{ myRank }}</span></p>
                <p id="info"><span>Point</span><span>:</span><span>{{ myPoint }}</span></p>
                <p id="info"><span>Solved</span><span>:</span><span>{{ mySolved }}</span></p>
            </div>
        </div>
        <div id="graph">
            <pie :datas=datas :labels=labels></pie>
        </div>
        <div id="ploblemTable">
            <table>
                <caption>solve ploblem</caption>
                <tr id="table1">
                    <th id="solve">solve</th>
                    <th id="ploblem">問題名</th>
                    <th id="genre">ジャンル</th>
                    <th id="point">得点</th>
                </tr>
                <tr v-for="(list, index) in lists" v-bind:id=bindeId+index%2>
                    <td><b v-if=list.isSolve>★</b></td>
                    <td>{{ list.ploblem }}</td>
                    <td>{{ list.genre }}</td>
                    <td>{{ list.point }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="solve-ploblem">
    </div>
</div>
</template>

<script>
import Vue  from "vue";
Vue.component('pie', require('./chart/pie.vue'));
export default {
    props:["show"],
    mounted () {
        this.isAuth()
    },
    updated () {
        this.isAuth()
    },
    data () {
        return {
            bindeId : "table",
            myIcon  : "/image/icon/icon-400.png",
            myName  : "Test Name",
            myRank  : 20,
            myPoint : 2000,
            mySolved: 6,
            datas   : [5, 5, 5, 5, 5, 5, 5],
            labels  : ["misc", "ppc", "crypt", "web", "bin", "pwn", "net"],
            lists: [
                {isSolve:1,ploblem: 'りんご',genre: "Web",point: 100},
                {isSolve:1,ploblem: 'ごりら',genre: "bin",point: 10},
                {isSolve:1,ploblem: 'らっぱ',genre: "bin",point: 200},
                {isSolve:0,ploblem: 'ぱんつ',genre: "fre",point: 100},
                {isSolve:1,ploblem: 'つみき',genre: "pwn",point: 100},
                {isSolve:0,ploblem: 'きのこ',genre: "Web",point: 100},
                {isSolve:1,ploblem: 'こーら',genre: "Web",point: 100},

            ]
        }
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
