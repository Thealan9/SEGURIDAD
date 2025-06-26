<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacios Disponibles</title>
</head>
<body>
    <h1>Espacios Disponibles</h1>
    <ul>
        @foreach ($spaces as $space)
            <li>
                <strong>{{ $space->name }}</strong>: {{ $space->description }} 
                - Precio por hora: ${{ $space->price_per_hour }}
            </li>
        @endforeach
    </ul>
</body>
</html>
