<template>
<div id="pie">
    <canvas id="chart" width="400" height="400"></canvas>
</div>
</template>
<script>
import Chart from 'chart.js'
import http from "../../service/http"

export default {
    data () {
        return {
            pieCoor:[
                "#2ecc71",
                "#3498db",
                "#95a5a6",
                "#9b59b6",
                "#f1c40f",
                "#e74c3c",
                "#34495e"
            ],
        }
    },
    beforeMount () {
    },
    mounted () {
        this.getIngo()
    },
    created () {
        this.createChart()
    },
    methods : {
        getIngo () {
            http.get("/user/raite",res => {
                var datas = []
                var labels = []
                var cate = JSON.stringify(res.data);
                cate = JSON.parse(cate)
                Object.keys(cate).forEach(function (key,index){
                    labels.push(key)
                    datas.push(cate[key])
                })
                for (var i=0; i < datas.length; i++ ){
                    this.chart.data.labels.push(labels[i])
                    this.chart.data.datasets.forEach((dataset) => {
                        dataset.data.push(datas[i])
                    })
                }
                this.chart.update();
            },error => {
                console.log("err")
            })
        },
        createChart () {
            this.$nextTick(() => {
                const ctx           = this.$el.querySelector('#chart').getContext('2d')
                ctx.canvas.height   = 400
                this.chart          = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            backgroundColor: this.pieCoor,
                            data: this.datas,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position : 'bottom',
                        }
                    }
                })
            })
        }
    }
}
</script>
