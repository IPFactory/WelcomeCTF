<template>
<div id="pie">
    <canvas id="chart" width="400" height="400"></canvas>
</div>
</template>
<script>
import Chart from 'chart.js';
export default {
    props : ['datas','labels'],
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
            ]
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
