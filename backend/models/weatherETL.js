// Get data from 04_unloadWeather.js
const pastWeatherUrl = './backend/db/04_unloadPastWeather.php';
const mergedWeatherUrl = './backend/db/05_mergeCurrentWeather.php';
const spotifyParametersUrl = './backend/db/04_unloadSpotify.php';

// Define html elements
const htmlPage = document.querySelector('#webPage');
const weatherDescriptionBox = document.querySelector('#weather-desc-box');
const weatherIconBox = document.querySelector('#weather-icon-box');
const windBox = document.querySelector('#flag-icon-box');
const temperatureBox = document.querySelector('#temp-box');
// Players
const lottiePlayer = document.querySelector('lottie-player');
const player = document.querySelector('#spotify-container');
let iframePlayer = document.querySelector('#spotify-iframe');
// Weather review container
const weatherReviewSlot1 = document.querySelector('#past-weather-icon-1');
const weatherReviewSlot2 = document.querySelector('#past-weather-icon-2');
const weatherReviewSlot3 = document.querySelector('#past-weather-icon-3');


// Fetch current weather values
try {
    fetch(mergedWeatherUrl)
        .then(response => {
            // Check if the response is successful (status code 200)
            if (!response.ok) {
                throw new Error(Error);
            }
            // Parse the JSON response
            return response.json();
        })
        // Append to html
        .then(data => {
            console.log('Current Weather: ', data);
            temperatureBox.innerHTML = `${data.temperature}°C`;
            weatherDescriptionBox.innerHTML = data.weatherCodeDescription;

            // // Debug themes:
            // data.weatherCodeDescription = 'Klar';
            // data.isDay = 0;
            // date = '';
            // console.log(data.weatherCodeDescription, data.isDay, date);

            // Easter eggs
            let date = new Date();
            let dateDay = date.getDay();
            let dateMonth = date.getMonth();

            // Case switch for weather icon
            switch (data.weatherCodeDescription) {
                case 'Klar':    // If weatherCodeDescription is 'Klar'
                    if (data.isDay === 1) {
                        htmlPage.setAttribute('data-theme', 'klar');    // Set respective color-theme
                        weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Tag.png" alt="Klar" class="h-full w-auto p-[10px]">`;    // Display 'Klar' icon
                    } else {
                        htmlPage.setAttribute('data-theme', 'nacht');
                        weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png" alt="Klar-Nacht" class="h-full w-auto p-[10px]">`;
                    } break;
                case 'Wulche':
                    htmlPage.setAttribute('data-theme', 'wulche');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Wulche.png" alt="Wulche" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Näbu':
                    htmlPage.setAttribute('data-theme', 'näbu');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Naebu.png" alt="Näbu" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Nisu':
                    htmlPage.setAttribute('data-theme', 'nisu');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Nisu.png" alt="Nisu" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Räge':
                    htmlPage.setAttribute('data-theme', 'räge');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Raege.png" alt="Räge" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Schnee':
                    htmlPage.setAttribute('data-theme', 'schnee');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/pos/Icons_Pos_Schnee.png" alt="Schnee" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Sturm':
                    htmlPage.setAttribute('data-theme', 'sturm');
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Sturm.png" alt="Sturm" class="h-full w-auto p-[10px]">`;
                    break;
            }

            //Easter egg themes
            if (dateDay === 23 && dateMonth === 3) {
                htmlPage.setAttribute('data-theme', 'joel');
                iframePlayer.innerHTML = `<iframe id="spotify-fallback-player" style="border-radius:12px" src="https://open.spotify.com/playlist/6A8WG11y1wfsFXlCOPNNke?si=173f485a9ddd448c" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>`;
            }
            if (dateDay === 17 && dateMonth === 3) {
                htmlPage.setAttribute('data-theme', 'stpatrick');
                iframePlayer.innerHTML = `<iframe id="spotify-fallback-player" style="border-radius:12px" src="https://open.spotify.com/playlist/4nuO2cmmwyQIP2Zqco61UE?si=04f9abe28cd34b9d" width="100%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>`;
            }


            if (data.windSpeed < 12) {
                if (data.weatherCodeDescription === 'Schnee') {
                    lottiePlayer.load('frontend/public/animations/Wind_Pos_Level_1.json');
                } else {
                    lottiePlayer.load('frontend/public/animations/Wind_Neg_Level_1.json');
                }
            }
            if (data.windSpeed >= 12 && data.windSpeed < 40) {
                if (data.weatherCodeDescription === 'Schnee') {
                    lottiePlayer.load('frontend/public/animations/Wind_Pos_Level_2.json');
                } else {
                    lottiePlayer.load('frontend/public/animations/Wind_Neg_Level_2.json');
                }
            }
            if (data.windSpeed >= 40) {
                if (data.weatherCodeDescription === 'Schnee') {
                    lottiePlayer.load('frontend/public/animations/Wind_Pos_Level_3.json');
                } else {
                    lottiePlayer.load('frontend/public/animations/Wind_Neg_Level_3.json');
                }
            }
        });
}
catch (error) {
    console.error(error);
}

// Insert past weather into weather review container
fetch(pastWeatherUrl)
    .then(response => {
        // Check if the response is successful (status code 200)
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        // Parse the JSON response
        return response.json();
    })
    .then(data => {
        // Define a mapping object for weather codes to icon names
        const weatherIcons = {
            0: 'Klar_Tag',
            1: 'Wulche',
            2: 'Wulche',
            3: 'Wulche',
            45: 'Naebu',
            48: 'Naebu',
            51: 'Nisu',
            53: 'Nisu',
            55: 'Nisu',
            56: 'Nisu',
            57: 'Nisu',
            61: 'Raege',
            63: 'Raege',
            65: 'Raege',
            66: 'Raege',
            67: 'Raege',
            80: 'Raege',
            81: 'Raege',
            82: 'Raege',
            71: 'Schnee',
            73: 'Schnee',
            75: 'Schnee',
            77: 'Schnee',
            85: 'Schnee',
            86: 'Schnee',
            95: 'Sturm',
            96: 'Sturm',
            99: 'Sturm'
        };

        // Iterate over each weather code and generate the corresponding image element
        for (let i = 0; i < data.weatherCode.length; i++) {
            const code = data.weatherCode[i];
            const iconName = weatherIcons[code];

            // Remove spaces from iconName
            const imgRegex = iconName.replace(/\s/g, '');

            // Create the image source URL without spaces
            const imageSrc = data.weatherCodeDescription === 'Schnee' ?
                `frontend/public/img/weather_icons/pos/Icons_Pos_${imgRegex}.png` :
                `frontend/public/img/weather_icons/neg/Icons_Neg_${imgRegex}.png`;

            // Create the image element
            const imageElement = document.createElement('img');
            imageElement.src = imageSrc;
            imageElement.alt = 'Wätter';
            imageElement.classList.add('h-full', 'w-auto');

            // Append the image element to the appropriate slot
            const slotId = `past-weather-icon-${i + 1}`;
            const slotElement = document.querySelector(`#${slotId}`);
            if (slotElement) {
                slotElement.innerHTML = '';
                slotElement.appendChild(imageElement);
            }
        }

        console.log('Past Weather: ', data);
    })
    .catch(error => {
        console.error('Error fetching past weather data:', error);
    });
