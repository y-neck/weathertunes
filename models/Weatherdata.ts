export interface CurrentWeather {
  temperature2m: number;
  isDay: number;
  windSpeed10m: number;
  weatherCode: number;
}

export interface WeatherData {
  current: CurrentWeather;
}
