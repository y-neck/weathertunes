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
  // // DEBUG: check if currentWeatherData is being passed correctly to the function
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
    // enforce utc parsing to avoid timezone issues
    const normaliseToUtc: (timestamp: string) => number = (
      timestamp: string,
    ): number => {
      const isUtcDesignated: boolean =
        timestamp.endsWith('Z') || /[+-]\d{2}:\d{2}$/.test(timestamp); // check if timestamp is UTC
      const utcString: string = isUtcDesignated ? timestamp : `${timestamp}Z`; // ensure UTC designation
      const currentTimeMs: number = new Date(utcString).getTime(); // create new date object and get time in milliseconds

      if (Number.isNaN(currentTimeMs)) {
        throw new Error(
          `weatherLoader storePastWeather: Invalid timestamp — could not parse "${timestamp}" as UTC.`,
        );
      }
      return currentTimeMs;
    };

    const currentWeatherTimestamp: number = normaliseToUtc(
      currentWeatherData.time,
    );

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
      const lastEntryTimestamp: number = normaliseToUtc(
        latestWeatherEntry.time,
      ); // get utc-normalized timestamp of last entry in milliseconds
      const agecurrentTimeMs: number =
        currentWeatherTimestamp - lastEntryTimestamp; //numeric time comparison in milliseconds
      const ageSeconds: number = Math.round(agecurrentTimeMs / 1000);

      // // DEBUG:
      // console.log(
      //   `storePastWeather — age: ${ageSeconds}s | threshold: ${storageDelay / 1000}s | shouldStore: ${agecurrentTimeMs >= storageDelay}`,
      // );

      // store entry if the age of the last entry exceeds the storage delay threshold
      shouldStore = agecurrentTimeMs >= storageDelay;
    }

    if (!shouldStore) {
      return;
    }
    // store the current weather data as a new entry in the database
    const { error: insertError } = await supabase.from('weather').insert({
      ...currentWeatherData,
      time: new Date(currentWeatherTimestamp).toISOString(), // convert timestamp to ISO string, ensuring consistent formatting ending with 'Z' for UTC
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
