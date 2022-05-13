<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav><a href="/">Index</a></nav>
	<h1>Genres</h1>
	@foreach($Genres as $Genres)
        <div>
        	<ul>
            	<li><a href="/genres/{{ $Genres->genres }}">Genre: {{ $Genres->genres }}</a></li>
            </ul>
        </div>
    @endforeach
</body>
</html>