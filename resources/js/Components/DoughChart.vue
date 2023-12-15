<template>
  <div class="mb-4 bg-brand-cream p-4 rounded-xl">
    <h1 class="text-lg font-bold">{{ props.datasets[0].label }}</h1>
    <canvas ref="canvas"></canvas>
  </div>
</template>


<script setup>
    import { ref, onMounted } from 'vue';
    import Chart from 'chart.js/auto';

    const props = defineProps({
        labels: Array,
        datasets: Array,
    })


    const canvas = ref(null);

    const plugin = {
        id: 'customCanvasBackgroundColor',
        beforeDraw: (chart, args, options) => {
            const {ctx} = chart;
            ctx.save();
            ctx.globalCompositeOperation = 'destination-over';
            ctx.fillStyle = options.color || '#99ffff';
            ctx.fillRect(0, 0, chart.width, chart.height);
            ctx.restore();
        }
    };

    const createChart = () => {

        const ctx = canvas.value.getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: props.labels,
            datasets: props.datasets
            },
            options: {
                plugins: {
                    customCanvasBackgroundColor: {
                        color: '#FEEDDF',
                    }
                },
                scales: {
                    y: {
                    beginAtZero: true
                    }
                },
    animations: {
      tension: {
        duration: 1000,
        easing: 'doughnut',
        from: 1,
        to: 0,
        loop: true,
        active: 100 ,
        resize: 10
      }
    },
                
            },
            plugins: [plugin],
        });

        canvas.value = myChart;
    }

    onMounted(createChart)

    
</script>



















<!-- <script setup>

    import { ref, watch, onMounted } from "vue";
    import { Chart, BarController, LinearScale, CategoryScale, BarElement, Tooltip, Legend } from "chart.js";
    import "chart.js/dist/chart.min.css";
  
    Chart.register(BarController, LinearScale, CategoryScale, BarElement, Tooltip, Legend);
  
    const props = defineProps({
      data: {
        type: Array,
        required: true
      },
      labels: {
        type: Array,
        required: true
      },
      options: {
        type: Object,
        default: () => ({})
      }
    });
  
    const canvas = ref(null);
    let chart = null;
  
    const createChart = () => {
      if (chart) {
        chart.destroy();
      }
      chart = new Chart(canvas.value, {
        type: "bar",
        data: {
          labels: props.labels,
          datasets: props.data
        },
        options: props.options
      });
    };
  
    onMounted(createChart);
    watch(props, createChart, { deep: true });
  </script>
   -->