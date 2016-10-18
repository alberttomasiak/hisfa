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

	{!! Form::text('content', (isset($silo->content->content)) ? $silo->content->content : ''); !!}

	{!! Form::label('Numer van de silo'); !!}

	{!! Form::number('number', (isset($silo->number)) ? $silo->number : ''); !!}

	{!! Form::label('Type'); !!}

	{!! Form::select('type', ['prime' => 'Prime', 'waste' => 'Waste'], $type) !!}

	{!! Form::label('Volume in de Silo'); !!}

	{!! Form::number('volume', (isset($silo->volume)) ? $silo->volume : ''); !!}

	@if( isset($button) )
	{!! Form::submit($button); !!}
	@else
	{!! Form::submit('Silo toevoegen'); !!}
	@endif

{!! Form::close() !!}

@endsection