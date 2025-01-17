<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Index</title>
</head>
<body>
    <h1>Media List</h1>
    <a href="{{ route('media.create') }}">Add New Media</a>

    <ul>
        @foreach($mediaItems as $media)
            <li>
                <a href="{{ route('media.show', $media->id) }}">{{ $media->title }}</a>
                <p>Rating: {{ $media->rating }}</p>
                <p>Length: {{ $media->length_in_minutes }} minutes</p>
                <p>Type: {{ $media->type }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
