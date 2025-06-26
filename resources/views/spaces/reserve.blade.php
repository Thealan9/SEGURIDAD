<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar un Espacio</title>
</head>
<body>
    <h1>Reservar un Espacio</h1>
    <form method="POST" action="{{ route('spaces.reserve') }}">
        @csrf
        <label for="space_id">Espacio:</label>
        <select name="space_id" id="space_id" required>
            @foreach ($spaces as $space)
                <option value="{{ $space->id }}">{{ $space->name }}</option>
            @endforeach
        </select>

        <label for="start_time">Fecha y Hora de Inicio:</label>
        <input type="datetime-local" name="start_time" id="start_time" required>

        <label for="end_time">Fecha y Hora de Fin:</label>
        <input type="datetime-local" name="end_time" id="end_time" required>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>
