// Expose weather data via an API endpoint
import { getCurrentWeather } from "~/server/utils/weatherTransform";

export default defineEventHandler(async (event) => {
  const weatherData = await getCurrentWeather();
  return weatherData;
});
