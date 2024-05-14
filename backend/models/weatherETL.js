// Get data from 04_unloadWeather.js
const pastWeatherUrl = './backend/db/04_unloadWeather.php'
const mergedWeatherUrl = './backend/db/05_mergeCurrentWeather.php'

// Define html elements
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
                        weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Tag.png" alt="Klar" class="h-full w-auto p-[10px]">`;    // Display 'Klar' icon
                    } else {
                        weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png" alt="Klar-Nacht" class="h-full w-auto p-[10px]">`;
                    } break;
                case 'Wulche':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Wulche.png" alt="Wulche" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Näbu':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Naebu.png" alt="Näbu" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Nisu':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Nisu.png" alt="Nisu" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Räge':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Raege.png" alt="Räge" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Schnee':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/pos/Icons_Pos_Schnee.png" alt="Schnee" class="h-full w-auto p-[10px]">`;
                    break;
                case 'Sturm':
                    weatherIconBox.innerHTML = `<img src="frontend/public/img/weather_icons/neg/Icons_Neg_Sturm.png" alt="Sturm" class="h-full w-auto p-[10px]">`;
            }
        })
}
catch (error) {
    console.log(error)
}
