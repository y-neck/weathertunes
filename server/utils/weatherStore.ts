import { fetchWeatherApi } from "openmeteo";
import { getSupabaseClient } from "./supabase-config";

export async function storeCurrentWeather() {
  /* extract */
  const supabase = getSupabaseClient();

  /* Fetch current weather data from Open-Meteo API */
  /**
   * @param latitude {number} – Latitude of the location in WGS84 format (Payerne, CH)
   * @param longitude {number} – Longitude of the location (Payerne, CH)
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
  const responses = await fetchWeatherApi(url, params); // Fetch assembled API request url

  // process
  const response = responses[0];

  // Attributes for current weather
  const utcOffsetSeconds = response.utcOffsetSeconds();
  const timezone = response.timezone();
  const timezoneAbbreviation = response.timezoneAbbreviation();
  const latitude = response.latitude();
  const longitude = response.longitude();

  const current = responses[0].current()!;

  /**
   * Mapping the weather variables of the array to the corresponding attributes of the current weather JSON object
   * Note: The order of weather variables in the URL query and the indices below need to match!
   * @returns {object} – JSON Object containing the current weather data
   */
  const weatherData = {
    current: {
      temperature2m: current.variables(0)!.value(),
      isDay: current.variables(1)!.value(),
      windSpeed10m: current.variables(2)!.value(),
      weatherCode: current.variables(3)!.value(),
    },
  };

  /* load into database */
  // DEBUG:
  console.log("WeatherData Obj: ", weatherData.current);

  // store current weather data in supabase
  try {
    const { error } = await supabase
      .from("weather")
      .insert({
        latitude: latitude,
        longitude: longitude,
        time: new Date().toISOString(),
        isDay: weatherData.current.isDay,
        temperature2m: Math.round(weatherData.current.temperature2m),
        windSpeed10m: weatherData.current.windSpeed10m,
        weatherCode: weatherData.current.weatherCode,
      })
      .single();
  } catch (error) {
    console.error("Error storing current weather data:", error);
  }

  /* delete all entries older than x minutes */
  const lifespan = 90; // INFO: Set max age of weather data in minutes
  try {
    const cutoff = new Date(Date.now() - lifespan * 60_000).toISOString();
    const { error } = await supabase
      .from("weather")
      .delete()
      .lte("time", cutoff);
    console.log("Deleted old weather data");

    if (error) {
      throw error;
    }
  } catch (error) {
    console.error("Error deleting old weather data:", error);
  }

  return weatherData.current;
}
