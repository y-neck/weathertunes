<template>
  <Scatter
    :data="chartData"
    :options="chartOptions"
    class="h-full w-full"
    width="600"
    height="800"
    aria-label="Grafik, wie die Musikstile dem Wetter zugeordnet werden."
  />
</template>

<script setup>
import { Scatter } from "vue-chartjs";
import {
  Chart as ChartJS,
  ScatterController,
  PointElement,
  LinearScale,
  Title,
  Tooltip,
  Legend,
} from "chart.js";

ChartJS.register(
  ScatterController,
  PointElement,
  LinearScale,
  Title,
  Tooltip,
  Legend,
);

const chartData = {
  labels: [
    "Sonne",
    "Regen",
    "Schnee",
    "Wind",
    "Nebel",
    "Regen & Schnee",
    "Regen & Wind",
    "Schnee & Wind",
    "Sonne & Regen",
    "Sonne & Regen & Wind",
    "Sonne & Regen & Schnee",
    "Sonne & Regen & Wind & Schnee",
  ],
  datasets: [
    {
      label: "",
      data: [
        {
          x: 7,
          y: 1,
        }, // Sturm
        {
          x: 7,
          y: 2,
        },
        {
          x: 7,
          y: 13,
        },
        {
          x: 7,
          y: 16,
        },
        {
          x: 7,
          y: 20,
        },

        {
          x: 6,
          y: 7,
        }, // Schnee
        {
          x: 6,
          y: 10,
        },
        {
          x: 6,
          y: 12,
        },
        {
          x: 6,
          y: 13,
        },
        {
          x: 6,
          y: 15,
        },

        {
          x: 5,
          y: 3,
        }, // Räge
        {
          x: 5,
          y: 4,
        },
        {
          x: 5,
          y: 11,
        },
        {
          x: 5,
          y: 16,
        },
        {
          x: 5,
          y: 18,
        },

        {
          x: 4,
          y: 5,
        }, // Nisu
        {
          x: 4,
          y: 6,
        },
        {
          x: 4,
          y: 7,
        },
        {
          x: 4,
          y: 8,
        },
        {
          x: 4,
          y: 10,
        },

        {
          x: 3,
          y: 9,
        }, // Näbu
        {
          x: 3,
          y: 10,
        },
        {
          x: 3,
          y: 11,
        },
        {
          x: 3,
          y: 12,
        },
        {
          x: 3,
          y: 13,
        },

        {
          x: 2,
          y: 14,
        }, // Wulche
        {
          x: 2,
          y: 15,
        },
        {
          x: 2,
          y: 16,
        },
        {
          x: 2,
          y: 17,
        },
        {
          x: 2,
          y: 18,
        },

        {
          x: 1,
          y: 19,
        }, // Klar
        {
          x: 1,
          y: 20,
        },
        {
          x: 1,
          y: 21,
        },
        {
          x: 1,
          y: 22,
        },
        {
          x: 1,
          y: 23,
        },
      ],
      /**
       * Assigns a color to each data point depending on its x value.
       * The colors are chosen to be visually distinct and to match the
       * color scheme of the website.
       * @param {object} context - The context of the chart.
       * @returns {string} The color of the data point.
       */
      backgroundColor: (context) => {
        const x = context.raw.x;
        return (
          {
            // Schnee
            7: "rgb(17, 15, 26)",
            // Räge
            6: "rgb(184, 200, 217)",
            // Nisu
            5: "rgb(89, 108, 128)",
            // Näbu
            4: "rgb(172, 191, 185)",
            // Wulche
            3: "rgb(170, 177, 178)",
            // Klar
            2: "rgb(163, 180, 204)",
            // Default color
            1: "rgb(255, 181, 77)",
            // If x is not one of the above values, use a default color (rgba(75, 192, 192, 0.6)).
          }[x] || "rgba(75, 192, 192, 0.6)"
        );
      },
      borderColor: (context) => {
        const x = context.raw.x;
        return (
          {
            7: "rgb(17, 15, 26)",
            6: "rgb(184, 200, 217)",
            5: "rgb(89, 108, 128)",
            4: "rgb(172, 191, 185)",
            3: "rgb(170, 177, 178)",
            2: "rgb(163, 180, 204)",
            1: "rgb(255, 181, 77)",
          }[x] || "rgba(75, 192, 192, 1)"
        ); // Default color
      },
      borderWidth: 1,
      pointRadius: 8, // default is 3
    },
  ],
};

const weatherLabels = [
  "",
  "KLAR",
  "WULCHE",
  "NÄBU",
  "NISU",
  "RÄGE",
  "SCHNEE",
  "STURM",
  "",
];
const musicLabels = [
  "",
  "ELECTRO",
  "HEAVY-METAL",
  "SOUL",
  "RAINY-DAY",
  "PIANO",
  "TRIP-HOP",
  "INDIE",
  "R-N-B",
  "NEW-AGE",
  "CHILL",
  "JAZZ",
  "CLASSICAL",
  "AMBIENT",
  "SSW",
  "FOLK",
  "BLUES",
  "ALT-ROCK",
  "ACOUSTIC",
  "LATIN",
  "ROCK",
  "INDIE-POP",
  "REGGAE",
  "POP",
  "",
];
const chartOptions = {
  plugins: {
    title: {
      display: false,
    },
    legend: {
      display: false,
    },
    tooltip: {
      callbacks: {
        /**
         * Customizes the tooltip label to show music + weather info.
         * @param {object} ctx - The context of the chart.
         * @returns {string} The customized label.
         */
        label: (ctx) => {
          /**
           * The weather type (Schnee, Räge, etc.) for the given x value.
           * @type {string}
           */
          const weather = weatherLabels[ctx.raw.x] || `Typ ${ctx.raw.x}`;
          const music = musicLabels[ctx.raw.y] || `Genre ${ctx.raw.y}`;
          return `${weather} → ${music}`;
        },
      },
    },
    responsive: true,
    maintainAspectRatio: false,
  },
  scales: {
    x: {
      type: "linear",
      position: "bottom",
      min: 0,
      max: 8,
      /**
       * Grid lines are only drawn at the tick values (i.e. 0, 1, 2, etc.).
       * The grid lines are not drawn for the axis labels (i.e. the numbers).
       * The grid lines are drawn in black (rgba(0, 0, 0, 1)) if the tick value is 0,
       * and in transparent (rgba(0, 0, 0, 0)) otherwise.
       */
      grid: {
        /**
         * Whether to draw a border around the plot area.
         */
        drawBorder: false,

        /**
         * The color of the grid lines.
         * @param {object} ctx - The context of the chart.
         * @returns {string} The color of the grid line.
         */
        color: (ctx) =>
          ctx.tick.value === 0 ? "rgba(0, 0, 0, 1)" : "rgba(0, 0, 0, 0)",
        lineWidth: (ctx) => (ctx.tick.value === 0 ? 2 : 0),
      },
      ticks: {
        /**
         * The color of the tick labels.
         * @type {string}
         */
        color: "rgb(10, 10, 10)",

        /**
         * A callback function that is called for each tick value.
         * @param {number} value - The tick value.
         * @returns {string} The label for the tick.
         */
        callback: (value) => weatherLabels[value],
      },
      minRotation: 90,
      maxRotation: 90,
    },
    y: {
      type: "linear",
      min: 0,
      max: 24,
      grid: {
        drawBorder: false,
        color: (ctx) =>
          ctx.tick.value === 0 ? "rgba(0, 0, 0, 1)" : "rgba(0, 0, 0, 0)",
        lineWidth: (ctx) => (ctx.tick.value === 0 ? 2 : 0),
      },
      ticks: {
        color: "rgb(10, 10, 10)",
        stepSize: 1,
        callback: (value) => musicLabels[value],
      },
    },
  },
};
</script>

<style scoped></style>
