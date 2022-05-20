<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav><a href="/">Index</a></nav>
		<h1>Songs</h1>
	@foreach($Songs as $Songs)
        <div>
        	<ul>
            	<li><a href="/genres/{{ $Songs->songsgenre }}/{{ $Songs->id }}/{{ $userId }}">Song: {{ $Songs->songnaam }}</a></li>
            </ul>
        </div>
    @endforeach
</body>
</html>