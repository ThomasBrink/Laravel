<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav><a href="/">Index</a></nav>

	<h1>Song detail</h1>
	@foreach($Song as $Song)
	<ul>
		<li>Song: {{ $Song->songnaam }}</li>

		<li>Creator: {{ $Song->songcreator }}</li>

		<li>Genre: {{ $Song->songsgenre }}</li>

		<li>Time: {{ $Song->songduur }}</li>
	</ul>
	@endforeach

	<div>
		<form action="/songadd" method="POST">
			@csrf
			<label for="name">Playlist:</label>
			<select name="listId">
				@foreach($Lists as $Lists)
					<option value="{{ $Lists->id }}">{{ $Lists->listnaam}}</option>
				@endforeach
			</select>
			<br>
			<input type="hidden" name="song" value="{{ $Song->songnaam }}">
			<input type="hidden" name="duur" value="{{ $Song->songduur }}">
			<input type="submit" value="Voeg toe aan playlist">
		</form>
	</div>
</body>
</html>