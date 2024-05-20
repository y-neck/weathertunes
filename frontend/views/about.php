<?php
require_once '../components/layout.php';
?>

<html lang="de" id="webPage" data-theme="fallback">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scatter Chart with Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body.bg-background {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body class="bg-background">
    <main class="w-full bg-background p-4">
        <canvas id="myScatterChart" width="400" height="800"></canvas>
        <script>
            const ctx = document.getElementById('myScatterChart').getContext('2d');
            const myScatterChart = new Chart(ctx, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: '',
                        data: [
                            { x: 7, y: 1 }, // Sturm
                            { x: 7, y: 2 },
                            { x: 7, y: 13 },
                            { x: 7, y: 16 },
                            { x: 7, y: 20 },

                            { x: 6, y: 7 }, // Schnee
                            { x: 6, y: 10 },
                            { x: 6, y: 12 },
                            { x: 6, y: 13 },
                            { x: 6, y: 15 },

                            { x: 5, y: 3 }, // Räge
                            { x: 5, y: 4 },
                            { x: 5, y: 11 },
                            { x: 5, y: 16 },
                            { x: 5, y: 18 },

                            { x: 4, y: 5 }, // Nisu
                            { x: 4, y: 6 },
                            { x: 4, y: 7 },
                            { x: 4, y: 8 },
                            { x: 4, y: 10 },

                            { x: 3, y: 9 }, // Näbu
                            { x: 3, y: 10 },
                            { x: 3, y: 11 },
                            { x: 3, y: 12 },
                            { x: 3, y: 13 },

                            { x: 2, y: 14 }, // Wulche
                            { x: 2, y: 15 },
                            { x: 2, y: 16 },
                            { x: 2, y: 17 },
                            { x: 2, y: 18 },

                            { x: 1, y: 19 }, // Klar
                            { x: 1, y: 20 },
                            { x: 1, y: 21 },
                            { x: 1, y: 22 },
                            { x: 1, y: 23 }
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: false
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            min: 0,
                            max: 7,
                            ticks: {
                                callback: function(value) {
                                    const labels = ['', 'KLAR', 'WULCHE', 'NÄBU', 'NISU', 'RÄGE', 'SCHNEE', 'STURM'];
                                    return labels[value];
                                },
                                minRotation: 90,
                                maxRotation: 90
                            }
                        },
                        y: {
                            type: 'linear',
                            min: 0,
                            max: 23,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    const labels = [
                                        '', 'ELECTRO', 'HEAVY-METAL', 'SOUL', 'RAINY-DAY', 'PIANO', 'TRIP-HOP', 'INDIE',
                                        'R-N-B', 'NEW-AGE', 'CHILL', 'JAZZ', 'CLASSICAL', 'AMBIENT', 'SSW', 
                                        'FOLK', 'BLUES', 'ALT-ROCK', 'ACOUSTIC', 'LATIN', 'ROCK', 
                                        'INDIE-POP', 'REGGAE', 'POP'
                                    ];
                                    return labels[value];
                                }
                            }
                        }
                    }
                }
            });
        </script>
    </main>
</body>