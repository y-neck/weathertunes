/* load weather from api endpoint */
import weatherCodeMapper from '~/utils/weatherConditions';

export async function loadCurrentWeather() {
  try {
    // get current weather directly from api
    const currentWeatherData = await $fetch('/api/weatherAPI');
    if (!currentWeatherData) return null;

    // map weather code to description, theme, and icon
    const mappedWeatherProperties = weatherCodeMapper(
      Number(currentWeatherData?.weatherCode),
      currentWeatherData?.isDay,
      Number(currentWeatherData?.windSpeed10m) || 0,
      String(currentWeatherData?.time),
    );

    // combine current weather data with mapped properties for frontend use
    return {
      ...currentWeatherData,
      weatherDescription: mappedWeatherProperties.weatherDescription,
      theme: mappedWeatherProperties.theme,
      weatherIcon: mappedWeatherProperties.weatherIcon,
      windSpeedIcon: mappedWeatherProperties.windSpeedIcon,
    };
  } catch (error) {
    console.error(
      'Composable: Unexpected error fetching current weather data:',
      error,
    );
    return null;
  }
}
