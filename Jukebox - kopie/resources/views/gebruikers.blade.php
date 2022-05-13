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
        <nav><a href="/gebruikers/create">Maak gebruiker</a></nav>
    </div>
        <div>
            <h1>Gebruikers</h1>
        </div>
        @foreach($gebruikers as $gebruikers)
            <div>
                <p>Gebruikers naam: {{ $gebruikers->naam }}</p>
                <p>Wachtwoord: {{ $gebruikers->wachtwoord }}</p>
            </div>
        @endforeach
    </body>
</html>
