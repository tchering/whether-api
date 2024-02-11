<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }

        #weather {
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #city-select {
            width: auto;
            display: inline-block;
        }

        label {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Weather Information</h1>
    <div class="mb-3">
        <label for="city-select" class="form-label">Choose a city:</label>
        <select id="city-select" class="form-select">
            <option value="London">London</option>
            <option value="New York">New York</option>
            <option value="Tokyo">Tokyo</option>
            <option value="Paris">Paris</option>
            <!-- Add more cities as needed -->
        </select>
    </div>
    <div id="weather" class="bg-light p-4 rounded">
        <p id="country">Country: -</p>
        <p id="city">City: Select a city</p>
        <p id="temperature">Temperature: -</p>
        <p id="description">Weather: -</p>
    </div>

    <script>
        const citySelect = document.getElementById('city-select');

        citySelect.addEventListener('change', function() {
            fetchWeatherData(this.value);
        });

        function fetchWeatherData(city) {
            const data = null;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `https://open-weather13.p.rapidapi.com/city/${city}`);
            xhr.setRequestHeader('X-RapidAPI-Key', 'b923021b0bmsh10f2e1461098cdep16357ejsn4ab2f249f90f'); // Your actual API key
            xhr.setRequestHeader('X-RapidAPI-Host', 'open-weather13.p.rapidapi.com');
            xhr.withCredentials = true;

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    console.log(response);
                    document.getElementById('country').innerHTML = `Country:${response.sys.country}`;
                    document.getElementById('city').textContent = `City: ${response.name}`;
                    document.getElementById('temperature').textContent = `Temperature: ${response.main.temp}°C`;
                    document.getElementById('description').textContent = `Weather: ${response.weather[0].description}`;
                }
            };

            xhr.send(data);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>