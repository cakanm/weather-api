## Weather API

Copy `.env.example` contents of file to `.env` and add your OpenWeather API key to `OPENWEATHER_API_KEY`.

To run Weather API with docker go to the application's directory and execute the following commands:

    docker build -t weather-api .
    docker run -it -p 8181:8181 weather-api

This will expose the application to http://127.0.0.1:8181.

To get weather data, POST `lat` and `long` values to http://127.0.0.1:8181/api/weather 
