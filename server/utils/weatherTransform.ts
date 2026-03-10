// Fetch and process weather data from Open-Meteo API
import { fetchWeatherApi } from 'openmeteo';

export async function getCurrentWeather() {
  /* Fetch current weather data from Open-Meteo API */
  /**
   * @param latitude {number} – Latitude of the location in WGS84 format (Payerne, CH)
   * @param longitude {number} – Longitude of the location in WGS84 format (Payerne, CH)
   * @param current {string[]} – Array of weather variables to be returned
   * @param timezone {string} – Timezone of the location (Europe/Berlin)
   */
  const params = {
    latitude: 46.8219,
    longitude: 6.9382,
    current: ['temperature_2m', 'is_day', 'wind_speed_10m', 'weather_code'],
    timezone: 'Europe/Berlin',
  };
  const url = 'https://api.open-meteo.com/v1/forecast'; // API endpoint base url

  let responses: Awaited<ReturnType<typeof fetchWeatherApi>>;
  try {
    responses = await fetchWeatherApi(url, params); // Fetch assembled API request urlfet
  } catch (error) {
    console.error('Error fetching current weather data from API:', error);
    return null;
  }
  if (!responses || !responses[0]) {
    console.error('Invalid response from weather API');
    return null; // Handle empty or invalid response
  }

  // process
  const response = responses[0];
  const current = responses[0].current()!;

  /**
   * Mapping the weather variables of the array to the corresponding attributes of the current weather JSON object
   * Note: The order of weather variables in the URL query and the indices below need to match!
   * @param time {string} – the time of the weather data fetch in ISO format
   * @param latitude {number} – the latitude of the location for which the weather data is being fetched
   * @param longitude {number} – the longitude of the location for which the weather data is being fetched
   * @param temperature2m {number} – the current temperature at 2m in °C
   * @param isDay {boolean | number} – indicates if it's day (1) or night (0)
   * @param weatherCode {number} – the weather code provided by the Open-Meteo API
   * @param windSpeed10m {number} – the current wind speed at 10m in km/h
   * @returns {object} – JSON Object containing the current weather data
   */
  const weatherData = {
    current: {
      time: new Date().toISOString(),
      latitude: response.latitude(),
      longitude: response.longitude(),
      temperature2m: Math.round(current.variables(0)!.value()),
      isDay: current.variables(1)!.value(),
      weatherCode: current.variables(3)!.value(),
      windSpeed10m: Math.round(current.variables(2)!.value()),
    },
  };
  console.log('Fetched current weather data from API: ', weatherData);
  return weatherData.current;
}
