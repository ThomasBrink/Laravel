<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav><a href="/">Index</a></nav>
    <nav><a href="/gebruikers">Gebruiker</a></nav>
    <nav><a href="/gebruikers/create">Maak gebruiker</a></nav>

	<h1>Create page</h1>

	<div>
		<form action="/gebruikers" method="POST">
			@csrf
			<label for="naam">Gebruikers naam</label>
			<br>
			<input type="text" name="naam">
			<br>
			<br>

			<label for="wachtwoord">Wachtwoord</label>
			<br>
			<input type="text" name="wachtwoord">
			<br>
			<br>
			<input type="submit" value="maak gebruiker aan">
		</form>
	</div>
</body>
</html>