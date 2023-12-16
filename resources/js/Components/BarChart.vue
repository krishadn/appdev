<template>
  <div class="mb-4 bg-brand-cream p-4 rounded-xl">
    <h1 class="text-lg font-bold">{{ props.datasets[0].label }}</h1>
    <canvas ref="canvas"></canvas>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import Chart from 'chart.js/auto';

const props = defineProps({
  labels: Array,
  datasets: Array,
});

const canvas = ref(null);

const plugin = {
  id: 'customCanvasBackgroundColor',
  beforeDraw: (chart, args, options) => {
    const { ctx } = chart;
    ctx.save();
    ctx.globalCompositeOperation = 'destination-over';
    ctx.fillStyle = options.color || '#99ffff';
    ctx.fillRect(0, 0, chart.width, chart.height);
    ctx.restore();
  },
};

const createChart = () => {
  if (canvas.value) {
    const ctx = canvas.value.getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: props.labels,
        datasets: props.datasets,
      },
      options: {
        plugins: {
          customCanvasBackgroundColor: {
            color: '#FEEDDF',
          },
          legend: {
            display: false
          },

        },
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
      plugins: [plugin],
    });

    // Save the chart reference to be able to destroy it later
    canvas.value.__chart__ = myChart;
  }
};

onMounted(createChart);

// Watch for changes in props and recreate the chart
watch(() => [props.labels, props.datasets], createChart, { deep: true });

</script>
