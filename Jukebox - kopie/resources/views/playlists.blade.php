<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Playlists</h1>
	@foreach($lists as $lists)
        <div>
        	<ul>
            	<li>
            	<a href="/playlist/{{ $lists->id }}">Playlist: {{ $lists->listnaam }}</a> 
            	<br>
            	<br>
            	<a href="/playlist/deletelist/{{ $lists->id }}">Verwijder deze playlist</a>
            	</li>
            </ul>
        </div>
    @endforeach

    <a href="/playlist/create">Maak een playlist aan</a>
</body>
</html>