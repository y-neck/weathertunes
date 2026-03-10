import {
  loadCurrentWeather,
  storePastWeather,
} from '~/server/utils/weatherLoader';

// fetch current weather data and store it as past weather data in the database
export default defineEventHandler(async () => {
  // fetch current weather data from api via loadCurrentWeather function -> ensures same data as is used in the frontend
  const weather = await loadCurrentWeather();
  if (!weather) return null;

  // store current weather data as past weather data in the database via storePastWeather function
  await storePastWeather({
    time: weather.time,
    latitude: weather.latitude,
    longitude: weather.longitude,
    temperature2m: weather.temperature2m,
    isDay: weather.isDay,
    weatherCode: weather.weatherCode,
    windSpeed10m: weather.windSpeed10m,
  });

  return weather;
});
