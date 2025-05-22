<!DOCTYPE html>
<html>
<head>
    <title>Weather Info</title>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
        }
        .card {
            padding: 20px;
            border: 1px solid #ddd;
            width: 30%;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h2>Weather Information</h2>
    <div class="container">
        @foreach($weatherData as $weather)
            <div class="card">
                @if(isset($weather['error']))
                    <p><strong>{{ $weather['city'] }}</strong></p>
                    <p style="color:red;">{{ $weather['error'] }}</p>
                @else
                    <p><strong>City:</strong> {{ $weather['city'] }}</p>
                    <p><strong>Temperature:</strong> {{ $weather['temperature'] }}°C</p>
                    <p><strong>Description:</strong> {{ $weather['description'] }}</p>
                    <p><strong>Humidity:</strong> {{ $weather['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
