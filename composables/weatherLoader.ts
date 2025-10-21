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

// // get past weather data from supabase
// const supabase = getSupabaseClient();
// try {
//   const { data, error } = await supabase
//     .from("weather")
//     .select("time, isDay, temperature2m, windSpeed10m, weatherCode")
//     .order("time", { ascending: false })
//     .limit(1)
//     .single();

//   console.log("Past weather Data from weatherLoader: ", data);
//   return data;
// } catch (error) {
//   console.log("Error retrieving current weather from database: ", error);
// }
