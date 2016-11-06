@extends('layouts.app')

@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "3") && $account_id = "[".Auth::user()->id."]")

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

@else
	@include('layouts.noaccess')
@endif
