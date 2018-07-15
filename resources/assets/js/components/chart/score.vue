<template>
<div id="line">
    <h1>TOP Ranker</h1>
    <canvas id="chart" width="400" height="400"></canvas>
</div>
</template>
<script>
import Chart from 'chart.js';
export default {
    props : ['datas','labels'],
    data () {
        return {
        }
    },
    mounted () {
        this.createChart()
    },
    methods : {
        createChart : function () {
            this.$nextTick(() => {
                const ctx = this.$el.querySelector('#chart').getContext('2d')
                ctx.canvas.height = 400
                this.chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: "testMen",
                            lineTension: 0,
                            fill: false,
                            borderColor: 'rgb(255, 0, 0)',
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
