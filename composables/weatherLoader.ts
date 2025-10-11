export async function loadCurrentWeather() {
  // get current weather directly from api
  try {
    const {data} = await useFetch("/api/weatherAPI");
    return data ?? null;
  } catch (error) {
    console.error(
      "Composable: Unexpected error fetching current weather data:",
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
