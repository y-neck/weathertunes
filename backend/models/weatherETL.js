// Get data from 04_unloadWeather.js
const currentWeatherUrl = 'https://214434-6.web.fhgr.ch/backend/db/04_unloadCurrentWeather.php'
const pastWeatherUrl = 'https://214434-6.web.fhgr.ch/backend/db/04_unloadWeather.php'

// Define html elements
const weatherDescriptionBox = document.querySelector('#weather-desc-box')
const weatherIconBox = document.querySelector('#weather-icon-box')
const windBox = document.querySelector('#flag-icon-box')
const temperatureBox = document.querySelector('#temp-box')

// Fetch current weather
try {
    fetch(currentWeatherUrl)
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
            //console.log('Current Weather: ', data)
            temperatureBox.innerHTML = `${data.temperature}°C`
        })
}
catch (error) {
    console.log(error)
}
