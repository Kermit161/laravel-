<!DOCTYPE html>
<html>
<head>
    <title>Planet Details</title>
</head>
<body>
    <h1>Details of {{ $planetDetail['name'] }}</h1>
    <p>{{ $planetDetail['description'] }}</p>
    <a href="{{ url('/planets') }}">Back to list of planets</a>
</body>
</html>
