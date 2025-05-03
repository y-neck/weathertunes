import { storeCurrentWeather } from "~/server/utils/weatherStore";
import { getCurrentWeather } from "~/server/utils/weatherLoader";

export default defineEventHandler(async () => {
  // store current weather data
  await storeCurrentWeather();
  // get latest weather data
  const latest = await getCurrentWeather();
  // DEBUG:
  console.log("Latest Weather Data from weatherAPI: ", latest);

  if (!latest)
    throw createError({
      statusCode: 500,
      statusMessage: "Error: No weather data found",
    });

  return latest;
});
