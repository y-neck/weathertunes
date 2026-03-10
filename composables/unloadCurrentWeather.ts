/* unload api data to the frontend and store it in the database */

// load current weather data and make it available to the frontend
export const currentWeatherData = () => {
  return useAsyncData('currentWeather', async () => {
    try {
      return await $fetch('/api/StoreWeather');
    } catch (error) {
      console.error(
        'useData: Unexpected error fetching current weather data:',
        error,
      );
      throw error;
    }
  });
};

// TODO #2: load past weather data from supabase and make it available to the frontend
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
