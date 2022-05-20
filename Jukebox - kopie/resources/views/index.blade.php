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
            <h1>Jukebox</h1>
            <form action="/" method="POST">
                @csrf
                <label for="gebruikersnaam">Gebruikers naam:</label>
                <br>
                <input type="text" name="gebruikersnaam">
                <br>
                <br>   
                <label for="wachtwoord">Wachtwoord:</label>
                <br>
                <input type="password" name="wachtwoord">
                <br>
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>