// Get data from 04_unloadWeather.js
const currentWeatherUrl = 'https://214434-6.web.fhgr.ch/backend/db/04_unloadCurrentWeather.php'
const pastWeatherUrl = 'https://214434-6.web.fhgr.ch/backend/db/04_unloadWeather.php'

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
}
catch (error) {
    console.log(error)
}