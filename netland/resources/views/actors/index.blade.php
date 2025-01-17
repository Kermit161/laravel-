<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actor Index</title>
</head>
<body>
    <h1>Actor List</h1>
    <a href="{{ route('actors.create') }}">Add New Actor</a>

    <ul>
        @foreach($actors as $actor)
            <li>
                <a href="{{ route('actors.show', $actor->id) }}">
                    {{ $actor->first_name }} {{ $actor->last_name }}
                </a>
                <p>Age: {{ $actor->age }} years</p>
                <p>Sex: {{ ucfirst($actor->sex) }}</p>
                <p>Country: {{ $actor->country }}</p>
                <p>Awards: {{ $actor->has_won_awards ? 'Yes' : 'No' }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
