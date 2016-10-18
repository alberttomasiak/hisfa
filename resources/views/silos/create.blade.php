@extends('layouts.app')

<!--@include('silos.nav')-->

@section('content')

@if( isset($method) && $method == 'edit' )
<form method="post" action="{{ action('SilosController@update', $silo->id) }}"> 
@else
{!! Form::open(['action' => 'SilosController@store']) !!}
@endif;

	{{ csrf_field() }}

	{!! Form::label('Wat zit er in de Silo?') !!}

	{!! Form::text('content'); !!}

	{!! Form::label('Numer van de silo'); !!}

	{!! Form::number('number', ''); !!}

	{!! Form::label('Type'); !!}

	{!! Form::select('type', ['stock' => 'Stock', 'waste' => 'Waste'], $type) !!}

	{!! Form::label('Volume in de Silo'); !!}

	{!! Form::number('volume', $silo->volume); !!}

	@if( $button )
	{!! Form::submit($button); !!}
	@else
	{!! Form::submit('Silo toevoegen'); !!}
	@endif

{!! Form::close() !!}

@endsection