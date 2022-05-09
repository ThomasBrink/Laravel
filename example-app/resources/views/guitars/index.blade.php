<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Test</h1>

	@if (count($guitars) > 0)

	@foreach ($guitars as $guitar)

	<div>
		<h3>
			<a href="{{route('guitars.show', ['guitar' => $guitar['id']])}}">{{$guitar['name']}}</a>
		</h3>
		<ul>
			<li>
				Made by: {{$guitar['brand']}}
			</li>
		</ul>
	</div>

	@endforeach

	@else
		<h2>There are no guitars to display</h2>
	@endif
	<div>
		User Input: {{$userInput}}
	</div>
</body>
</html>