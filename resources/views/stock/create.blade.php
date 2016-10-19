@extends('layouts.app')

@section('content')

<form method="post">
	{{ csrf_field() }}

	{!! Form::label('Grondstof type:') !!}
	{!! Form::text('type', (isset($stock->type) ? $stock->type : '')) !!}

	{!! Form::label('Grondstof tonnage:') !!}
	{!! Form::text('tonnage', (isset($stock->stock->tonnage) ? $stock->stock->tonnage : 0)) !!}

	@if( isset($stock) )
	{!! Form::submit('Opslagen') !!}
	@else
	{!! Form::submit('Aanmaken') !!}
	@endif

</form>

@endsection