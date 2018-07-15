<template>
    <div id="score-board">
        <div id="score-graph">
            <score :datas=datas :labels=labels></score>
        </div>
        <div id="score-table">
            <table>
                <caption>Ranking</caption>
                <tr id="table1">
                    <th id="solve">順位</th>
                    <th id="ploblem">ユーザー</th>
                    <th id="point">得点</th>
                </tr>
                <tr v-for="(list, index) in lists" v-bind:id=bindeId+index%2>
                    <td>{{ index+1 }}</td>
                    <td>{{ list.name }}</td>
                    <td>{{ list.point }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
import Vue  from "vue";
Vue.component('score', require('./chart/score.vue'));
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
            datas   : [0, 100, 200, 210, 340, 1000, 1200],
            labels  : ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00"],
            lists: [
                {name: 'りんご',point: 100},
                {name: 'ごりら',point: 99},
                {name: 'らっぱ',point: 98},
                {name: 'ぱんつ',point: 97},
                {name: 'つみき',point: 96},
                {name: 'きのこ',point: 95},
                {name: 'こーら',point: 94},

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
