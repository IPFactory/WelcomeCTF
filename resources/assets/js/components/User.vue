<template>
<div id="user">
    <div id="message">
        <div id="user-info">
            <div id="icon">
                <img id="icon-image" :src=myIcon>
            </div>
            <div id="user-name">
                <p>{{ user['user'] }}</p>
            </div>
            <div >
                <p id="info"><span>Rank</span><span>:</span><span>{{ user['rank'] }}</span></p>
                <p id="info"><span>Point</span><span>:</span><span>{{ user['point'] }}</span></p>
                <p id="info"><span>Solved</span><span>:</span><span>{{ user['solved'] }}</span></p>
            </div>
        </div>
        <div id="graph">
            <pie></pie>
        </div>
        <div id="ploblemTable">
            <table>
                <caption>solve ploblem</caption>
                <tr id="table1">
                    <th id="id">ID</th>
                    <th id="solve">solve</th>
                    <th id="ploblem">問題名</th>
                    <th id="genre">ジャンル</th>
                    <th id="point">得点</th>
                </tr>
                <tr v-for="(list, index) in lists" v-bind:id=bindeId+index%2>
                    <td>{{index + 1}}</td>
                    <td><b v-if=list.isSolve>★</b></td>
                    <td>{{ list.title }}</td>
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
import http from "../service/http"

Vue.component('pie', require('./chart/pie.vue'));
export default {
    props:["show"],
    mounted () {
        this.getUserData()
        this.getProblemList()
    },
    updated () {
        this.isAuth()
    },
    data () {
        return {
            user    : [],
            cate    : [],
            bindeId : "table",
            myIcon  : "/image/icon/icon-400.png",
            lists   : []
        }
    },
    methods :{
        getUserData () {
            http.get("/user/info",res => {
                this.user = JSON.stringify(res.data[0]);
                this.user = JSON.parse(this.user)
            },error => {
                console.log("err")
            })
        },
        getProblemList () {
            http.get("user/list",res => {
                this.lists = JSON.stringify(res.data);
                this.lists = JSON.parse(this.lists)
            },error => {
                console.log("err")
            })
        },
        isAuth () {
            if (!this.show) {
                this.$router.push('/')
            }
        }
    },
}

</script>
