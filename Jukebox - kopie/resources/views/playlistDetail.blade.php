<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>PlaylistDetail</h1>
	<h2>{{$lists[0]['listnaam']}}</h2>

	<div>
		<form action="/updatePlaylist" method="POST">
			@csrf
			<label for="naam">Pas playlist naam aan:</label>
			<input type="text" name="playlistnaam" value="{{$lists[0]['listnaam']}}">
			<input type="submit" value="pas naam aan">
			<input type="hidden" name="listId" value="{{ $listId }}">
		</form>
	</div>

	<h2>Songs in playlist:</h2>
	@foreach($songs as $songs)
        <div>
        	<ul>
            	<li>Song: {{ $songs->song }}</li>
            	<li>Duur: {{ $songs->duur }}</li>
            	<a href="/songDelete/{{ $songs->id }}/{{ $listId }}">verwijder uit playlist</a>
            </ul>
        </div>
    @endforeach

    <p>Totale duur : {{$totalTime[0]}} uur {{$totalTime[1]}} min {{$totalTime[2]}} sec</p>
</body>
</html>