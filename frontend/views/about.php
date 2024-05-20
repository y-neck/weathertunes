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
        <div class="container mx-auto text-left">
                <h1 class="text-4xl font-bold text-text mb-1">WETTERMIXER</h1>
        </div>
       <div>
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
                        backgroundColor: function(context) {
                            const xValue = context.raw.x;
                            if (xValue === 7) return 'rgb(17, 15, 26)';
                            if (xValue === 6) return 'rgb(184, 200, 217)';
                            if (xValue === 5) return 'rgb(89, 108, 128)';
                            if (xValue === 4) return 'rgb(172, 191, 185)';
                            if (xValue === 3) return 'rgb(170, 177, 178)';
                            if (xValue === 2) return 'rgb(163, 180, 204)';
                            if (xValue === 1) return 'rgb(255, 181, 77)';
                            return 'rgba(75, 192, 192, 0.6)'; // Default color
                        },
                         borderColor: function(context) {
                            const xValue = context.raw.x;
                            if (xValue === 7) return 'rgb(17, 15, 26)';
                            if (xValue === 6) return 'rgb(184, 200, 217)';
                            if (xValue === 5) return 'rgb(89, 108, 128)';
                            if (xValue === 4) return 'rgb(172, 191, 185)';
                            if (xValue === 3) return 'rgb(170, 177, 178)';
                            if (xValue === 2) return 'rgb(163, 180, 204)';
                            if (xValue === 1) return 'rgb(255, 181, 77)';
                            return 'rgba(75, 192, 192, 1)'; // Default color
                        },
                        borderWidth: 1,
                        pointRadius: 8 // default is 3
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
                            max: 8,
                            grid: {
                                drawBorder: false,
                                color: function(context) {
                                    if (context.tick.value === 0) {
                                        return 'rgba(0, 0, 0, 1)';
                                    }
                                    return 'rgba(0, 0, 0, 0)';
                                },
                                lineWidth: function(context) {
                                    if (context.tick.value === 0) {
                                        return 2;
                                    }
                                    return 0;
                                }
                            },
                            ticks: {
                                color: 'rgb(10, 10, 10)',
                                callback: function(value) {
                                    const labels = ['', 'KLAR', 'WULCHE', 'NÄBU', 'NISU', 'RÄGE', 'SCHNEE', 'STURM',''];
                                    return labels[value];
                                },
                                minRotation: 90,
                                maxRotation: 90
                            }
                        },
                        y: {
                            type: 'linear',
                            min: 0,
                            max: 24,
                            grid: {
                                drawBorder: false,
                                color: function(context) {
                                    if (context.tick.value === 0) {
                                        return 'rgba(0, 0, 0, 1)';
                                    }
                                    return 'rgba(0, 0, 0, 0)';
                                },
                                lineWidth: function(context) {
                                    if (context.tick.value === 0) {
                                        return 2;
                                    }
                                    return 0;
                                }
                            },
                            ticks: {
                                color: 'rgb(10, 10, 10)',
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
        </div> 
        <div class="container mx-auto text-left">
                <h1 class="text-4xl font-bold text-text mt-4">Wie geht das?</h1>
        </div>
        <div class="container mx-auto bg-background flex flex-col text-left">
            <p class="text-text mb-4">
                Alle 30 Minuten überprüft unsere Wetterfee das Wetter in Bern und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung.<br>
                Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.<br><br>
                Falls du genauer wissen möchtest, wie unsere Playlists zusammengestellt werden, findest du weitere Informationen in der Grafik. Die Daten dafür werden von <a href="https://open-meteo.com/" class="underline">OpenMeteo</a> und der <a href="https://developer.spotify.com/documentation/web-api" class="underline">Spotify Web API</a> bezogen.
            </p>
        </div>
    
    </main>     
</body>  
<?php require_once '../components/footer.html'; ?>

<script src="backend/models/weatherETL.js"></script>
<script type="module" src="backend/models/spotifyETL.js"></script>

</html>
