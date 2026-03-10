/* load weather from api endpoint */
import { getSupabaseClient } from '~/server/utils/supabase-config';
import type { CustomWeatherProperties } from '~/utils/weatherConditions';
import weatherCodeMapper from '~/utils/weatherConditions';

interface CurrentWeatherData {
  time: string;
  latitude: number;
  longitude: number;
  isDay: boolean | number;
  temperature2m: number;
  windSpeed10m: number;
  weatherCode: number;
}

export async function loadCurrentWeather() {
  try {
    // get current weather directly from api
    const currentWeatherData: CurrentWeatherData =
      await $fetch('/api/weatherAPI');
    if (!currentWeatherData) return null;

    // map weather code to description, theme, and icon
    const mappedWeatherProperties: CustomWeatherProperties = weatherCodeMapper(
      String(currentWeatherData?.time),
      Number(currentWeatherData.latitude),
      Number(currentWeatherData.longitude),
      Number(currentWeatherData?.isDay),
      Number(currentWeatherData?.weatherCode),
      Number(currentWeatherData?.windSpeed10m) || 0,
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
      'WeatherLoader Composable: Unexpected error fetching current weather data:',
      error,
    );
    return null;
  }
}

// get past weather data from supabase
export async function storePastWeather(currentWeatherData: CurrentWeatherData) {
  // // DEBUG:
  // console.log(
  //   'storePastWeather called with currentWeatherData: ',
  //   currentWeatherData,
  // );

  const storageDelay: number = 30 * 60 * 1000; // storage delay in milliseconds

  try {
    // get currentWeatherTime
    if (!currentWeatherData?.time) {
      throw new Error(
        'weatherLoader storePastWeather: currentWeatherData time is unavailable.',
      );
    }
    const currentWeatherTime: Date = new Date(currentWeatherData.time);
    const currentWeatherTimestamp: number = currentWeatherTime.getTime(); // in milliseconds
    // get the latest weather entry from the database
    const supabase = getSupabaseClient();

    const { data: latestWeatherEntry, error } = await supabase
      .from('weather')
      .select('time')
      .order('time', { ascending: false })
      .limit(1)
      .maybeSingle();

    if (error) {
      throw new Error(
        'weatherLoader storePastWeather: Error retrieving latest past weather entry from database: ',
        error,
      );
    }
    // check if the entry should be stored
    let shouldStore: boolean = false;
    if (!latestWeatherEntry) {
      shouldStore = true;
    } else {
      const lastEntryTimestamp: number = new Date(
        latestWeatherEntry.time,
      ).getTime();
      const age: number = currentWeatherTimestamp - lastEntryTimestamp; //numeric time comparison in milliseconds
      shouldStore = age >= storageDelay;
    }

    if (!shouldStore) {
      return;
    }
    // store the current weather data as a new entry in the database
    const { error: insertError } = await supabase.from('weather').insert({
      ...currentWeatherData,
      time: new Date(currentWeatherTimestamp).toISOString(),
    });
    if (insertError) {
      console.error('Supabase insert error full object:', insertError);
      throw insertError;
    }
  } catch (error) {
    console.error(
      'Error comparing existing weather data to currentWeatherData: ',
      error,
    );
  }
}
