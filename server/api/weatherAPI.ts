import { storeCurrentWeather } from "~/server/utils/weatherStore";
import { getCurrentWeather } from "~/server/utils/weatherLoader";

// get latest weather data
export default defineEventHandler(async () => {
  let latest = await getCurrentWeather();
  // DEBUG:
  console.log("Latest Weather Data from weatherAPI: ", latest);

  if (!latest) {
    try {
      // store current weather data
      const fresh = await storeCurrentWeather();
      if (!fresh) {
        throw new Error("No data from storeCurrentWeather");
      }
      // get latest weather data
      console.log("Stored and returning fresh weather data:", fresh);
      return fresh;
    } catch (error) {
      console.error("Error storing or retrieving fresh data:", error);
      throw createError({
        statusCode: 500,
        statusMessage: "Error fetching new weather data",
      });
    }
  }

  return latest;
});
