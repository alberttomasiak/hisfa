@extends('layouts.app')

@include('silos.nav')

@section('content')

{!! Form::open(['action' => 'SilosController@store']) !!}

	{!! Form::number('number', ''); !!}

	{!! Form::select('type', ['stock' => 'Stock', 'waste' => 'Waste'], $type) !!}

	{!! Form::hidden('volume', '0' ); !!}

	{!! Form::submit('Silo toevoegen'); !!}

{!! Form::close() !!}

@endsection