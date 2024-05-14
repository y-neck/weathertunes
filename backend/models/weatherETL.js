// Get data from 04_unloadWeather.js
const pastWeatherUrl = './backend/db/04_unloadWeather.php'
const mergedWeatherUrl = './backend/db/05_mergeCurrentWeather.php'

// Define html elements
const htmlPage = document.querySelector('#webPage')
const weatherDescriptionBox = document.querySelector('#weather-desc-box')
const weatherIconBox = document.querySelector('#weather-icon-box')
const windBox = document.querySelector('#flag-icon-box')
const temperatureBox = document.querySelector('#temp-box')

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
            console.log('Current Weather: ', data)
            temperatureBox.innerHTML = `${data.temperature}°C`
            weatherDescriptionBox.innerHTML = data.weatherCodeDescription;

            // Case switch for weather icon
            switch (data.weatherCodeDescription) {
                case 'Klar':    // If weatherCodeDescription is 'Klar'
                    if (data.isDay === 1) {
                        htmlPage.setAttribute('data-theme', 'klar');    // Set respective color-theme
                        weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Tag.png" alt="Klar" class="h-full w-auto p-[10px]">`;    // Display 'Klar' icon
                    } else {
                        htmlPage.setAttribute('data-theme', 'klar');
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
            }
        })
}
catch (error) {
    console.log(error)
}
