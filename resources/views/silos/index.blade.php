@extends('layouts.app')

@include('silos.nav')

@section('content')
	<h1>Silos</h1>

	<ul>
	@foreach( $silos as $silo )

		<li>SILO: {{ $silo->nummer }}
		Vol:{{ $silo->volume }}%<br>
		Content:{{ $silo->content }}<br>

		<a href="{{ action('SilosController@destroy', [$silo->id]) }}">Verwijder deze silo</a>
		</li>
		
	@endforeach
	</ul>

@endsection