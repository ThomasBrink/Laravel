<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Logincheck</h1>
	@foreach($gebruiker as $gebruiker)

		@if($gebruiker->naam == $gebruiker->naam)
			<h2>{{ $gebruiker->naam }}</h2>
			<a href="/jukebox/{{ $gebruiker->id }}">ga veder op dit account</a>
		@endif
	@endforeach
	<br>
	<br>
	<a href="/">Terug</a>
</body>
</html>