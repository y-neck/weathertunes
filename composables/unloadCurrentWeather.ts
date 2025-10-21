/* unload api data to the frontend */
import { loadCurrentWeather } from '~/composables/weatherLoader';

// load current weather data from api
export const currentWeatherData = () => {
  return useAsyncData('currentWeather', async () => {
    try {
      return await loadCurrentWeather();
    } catch (error) {
      console.error(
        'useData: Unexpected error fetching current weather data:',
        error,
      );
      throw error;
    }
  });
};
