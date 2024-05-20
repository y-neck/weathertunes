<?php
require_once '../components/layout.php';
?>

<html lang="de" id="webPage" data-theme="fallback">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body class="bg-background">
    <main class="w-full bg-background p-4">
    <canvas id="myScatterChart" width="400" height="800"></canvas>
    <script>
        const ctx = document.getElementById('myScatterChart').getContext('2d');
        const myScatterChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Sample Data',
                    data: [
                        { x: 1, y: 1 },
                        { x: 2, y: 2 },
                        { x: 3, y: 3 },
                        { x: 4, y: 4 },
                        { x: 5, y: 5 },
                        { x: 6, y: 6 },
                        { x: 7, y: 7 }
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        min: 1,
                        max: 7,
                        ticks: {
                            callback: function(value) {
                                const labels = ['one', 'two', 'three', 'four', 'five', 'six', 'seven'];
                                return labels[value - 1];
                            },
                            minRotation: 90,
                            maxRotation: 90
                        },
                        title: {
                            display: true,
                            text: 'X-Axis (1-7)'
                        }
                    },
                    y: {
                        type: 'linear',
                        min: 1,
                        max: 23,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                const labels = [
                                    'electro', 'heavy-metal', 'soul', 'rainy-day', 'piano', 'trip-hop', 'indie, 
                                    'r-n-b', 'new-age', 'chill', 'jazz', 'classical', 'ambient', 'ssw', 
                                    'folk', 'blues', 'alt-rock', 'acoustic', 'latin', 'rock', 
                                    'indie-pop', 'reggae', 'pop'
                                ];
                                return labels[value - 1];
                            }
                        },
                        title: {
                            display: true,
                            text: 'Y-Axis (Genres)'
                        }
                    }
                }
            }
        });
    </script>


    
    </main>
</body>