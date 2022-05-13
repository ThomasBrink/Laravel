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
</body>
</html>