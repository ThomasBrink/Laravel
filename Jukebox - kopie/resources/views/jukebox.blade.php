<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
    <div>
        <nav><a href="/">Index</a></nav>
        <nav><a href="/gebruikers">Gebruikers</a></nav>
        <nav><a href="/genres/{{$userId}}">Genres overzicht</a></nav>
    </div>
        <div>
            <h1>Jukebox</h1>

            @foreach($Lists as $Lists)
            <div>
                <ul>
                    <li>
                    <a href="/playlist/{{ $Lists->id }}">Playlist: {{ $Lists->listnaam }}</a> 
                    <br>
                    <br>
                    <a href="/playlist/deletelist/{{ $Lists->id }}">Verwijder deze playlist</a>
                    </li>
                </ul>
            </div>
        @endforeach
        <a href="/playlist/create/{{ $userId }}">Maak playlist aan</a>
        </div>
    </body>
</html>