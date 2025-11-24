/* map weather data to the corresponding visuals and descriptions */
/**
 * define the structure of the returned WeatherProperties object
 */
export interface WeatherProperties {
  weatherDescription: string;
  theme: string;
  weatherIcon: string;
  windSpeedIcon: string;
}

/**
 * map weather code to weather description
 * @param {number} weatherCode – the weather code provided by the Open-Meteo API
 * @param {boolean| number} isDay – indicates if it's day (1) or night (0)
 * @param {number} windSpeed10m - the wind speed at 10m in km/h
 * @return {WeatherProperties} – an object containing weather description, theme, and icon
 */
export default function weatherCodeMapper(
  weatherCode: number,
  isDay: boolean | number,
  windSpeed10m: number,
  time: string,
): WeatherProperties {
  let weatherDescription = 'Wätter';
  let theme = 'fallback';
  let weatherIcon = '';
  let windSpeedIcon = '';

  const day = Number(isDay) === 1;
  // determine corresponding weather description based on weather code
  switch (weatherCode) {
    case 0:
      weatherDescription = 'Klar';
      theme = day ? 'klar' : 'nacht'; // switch theme based on day/night
      weatherIcon = day ? 'neg/Icons_Neg_Klar_Tag' : 'neg/Icons_Neg_Klar_Nacht';
      break;
    case 1:
    case 2:
    case 3:
      weatherDescription = 'Wulche';
      theme = 'wulche';
      weatherIcon = 'neg/Icons_Neg_Wulche';
      break;
    case 45:
    case 48:
      weatherDescription = 'Näbu';
      theme = 'naebu';
      weatherIcon = 'neg/Icons_Neg_Naebu';
      break;
    case 51:
    case 53:
    case 55:
    case 56:
    case 57:
      weatherDescription = 'Nisu';
      theme = 'nisu';
      weatherIcon = 'neg/Icons_Neg_Nisu';
      break;
    case 61:
    case 63:
    case 65:
    case 66:
    case 67:
    case 80:
    case 81:
    case 82:
      weatherDescription = 'Räge';
      theme = 'raege';
      weatherIcon = 'neg/Icons_Neg_Raege';
      break;
    case 71:
    case 73:
    case 75:
    case 77:
    case 85:
    case 86:
      weatherDescription = 'Schnee';
      theme = 'schnee';
      weatherIcon = 'pos/Icons_Pos_Schnee';
      break;
    case 95:
    case 96:
    case 99:
      weatherDescription = 'Sturm';
      theme = 'sturm';
      weatherIcon = 'neg/Icons_Neg_Sturm';
      break;
  }

  //   easter egg themes
  if (time.includes('3-23')) {
    theme = 'joel';
  }
  if (time.includes('3-17')) {
    theme = 'stpatrick';
  }

  // determine wind speed icon based on wind speed and theme
  if (windSpeed10m < 12) {
    if (theme === 'schnee') {
      windSpeedIcon = 'Wind_Pos_Level_1';
    } else {
      windSpeedIcon = 'Wind_Neg_Level_1';
    }
  }
  if (windSpeed10m >= 12 && windSpeed10m < 40) {
    if (theme === 'schnee') {
      windSpeedIcon = 'Wind_Pos_Level_2';
    } else {
      windSpeedIcon = 'Wind_Neg_Level_2';
    }
  }
  if (windSpeed10m >= 40) {
    if (theme === 'schnee') {
      windSpeedIcon = 'Wind_Pos_Level_3';
    } else {
      windSpeedIcon = 'Wind_Neg_Level_3';
    }
  }
  return { weatherDescription, theme, weatherIcon, windSpeedIcon };
}
