<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>PlaylistDetail</h1>
	@foreach($songs as $songs)
        <div>
        	<ul>
            	<li>Playlist: {{ $songs->song }}</li>
            	<a href="/songDelete/{{ $songs->id }}/{{ $listId }}">verwijder uit playlist</a>
            </ul>
        </div>
    @endforeach
</body>
</html>