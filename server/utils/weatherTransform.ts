// Fetch and process weather data from Open-Meteo API
import { fetchWeatherApi } from "openmeteo";

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
    current: ["temperature_2m", "is_day", "wind_speed_10m", "weather_code"],
    timezone: "Europe/Berlin",
  };
  const url = "https://api.open-meteo.com/v1/forecast"; // API endpoint base url

  let responses;
  try {
    responses = await fetchWeatherApi(url, params); // Fetch assembled API request url
  } catch (error) {
    console.error("Error fetching current weather data from API:", error);
    return null;
  }
  if (!responses || !responses[0]) {
    console.error("Invalid response from weather API");
    return null; // Handle empty or invalid response
  }

  // process
  const response = responses[0];
  const current = responses[0].current()!;

  /**
   * Mapping the weather variables of the array to the corresponding attributes of the current weather JSON object
   * Note: The order of weather variables in the URL query and the indices below need to match!
   * @returns {object} – JSON Object containing the current weather data
   */
  const weatherData = {
    current: {
      time: new Date(Date.now() + 2 * 60 * 60 * 1000)
        .toISOString()
        .replace(/[ZT]/g, " ["), // INFO: Adjust to CET/CEST timezone (UTC+2)
      latitude: response.latitude,
      longitude: response.longitude,
      temperature2m: Math.round(current.variables(0)!.value()),
      isDay: current.variables(1)!.value(),
      windSpeed10m: Math.round(current.variables(2)!.value()),
      weatherCode: current.variables(3)!.value(),
    },
  };
  console.log("Fetched current weather data from API: ", weatherData);
  return weatherData.current;
}
