@php
	$num = 0;
	if (session()->has('SessionPlaylist')) {
    	$num = count(session('SessionPlaylist'));
	}
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Session Playlist</h1>
	<div>
		@for ($i = 0; $i < $num; $i++)
    		<p>Song: {{ session('SessionPlaylist')[$i] }}</p>
		@endfor
		<form action="/sessionSongAdd/{{$userId}}" method="POST">
			@csrf
			<label for="name">Playlist:</label>
			<select name="songs">
				@foreach($Songs as $Songs)
					<option value="{{ $Songs->songnaam }}">{{ $Songs->songnaam }}</option>
				@endforeach
			</select>
			<br>
			<input type="hidden" name="userId" value="{{ $userId }}">
			<input type="submit" value="Voeg toe aan playlist">
		</form>

		<form action="/addSessionPlaylist" method="POST">
			@csrf

			<br>
			<input type="hidden" name="playlistnaam" value="SessionPlaylist">
			<input type="hidden" name="userId" value="{{ $userId }}">

			<input type="submit" value="Bewaar als playlist">
		</form>
	</div>
</body>
</html>