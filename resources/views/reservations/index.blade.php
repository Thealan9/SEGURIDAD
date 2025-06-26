<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
</head>

<body>
    <h1>Mis Reservas</h1>
    <ul>
        @foreach ($reservations as $reservation)
        <li>
            Espacio: {{ $reservation->space->name }}<br>
            Fecha Inicio: {{ $reservation->start_time }}<br>
            Fecha Fin: {{ $reservation->end_time }}
        
        @if ($reservation->status === 'active')
            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">Cancel</button>
            </form>
        @else
            <span>Cancelled</span>
        @endif
    </li>
        @endforeach

        
    </ul>
</body>

</html>