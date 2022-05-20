<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Maak playlist aan</h1>
	<div>
		<form action="/addplaylist" method="POST">
			@csrf
			<label for="naam">Playlist naam:</label>
			<br>
			<input type="text" name="playlistnaam">
			<br>
			<br>
			<input type="submit" value="maak playlist aan">
			<input type="hidden" name="userId" value="{{ $userId }}">
		</form>
	</div>
</body>
</html>