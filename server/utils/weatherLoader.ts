// get latest weather data from database
export async function getCurrentWeather() {
  const supabase = getSupabaseClient();
  try {
    const { data, error } = await supabase
      .from("weather")
      .select("time, isDay, temperature2m, windSpeed10m, weatherCode")
      .order("time", { ascending: false })
      .limit(1)
      .single();

    console.log("Weather Data from weatherLoader: ", data);
    return data;
  } catch (error) {
    console.log("Error retrieving current weather from database: ", error);
  }
}
