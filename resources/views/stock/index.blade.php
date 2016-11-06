@extends('layouts.app')

@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "2") && $account_id = "[".Auth::user()->id."]")

@section('content')

	<div class="col-md-8 col-md-offset-2">

		@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "3") && $account_id = "[".Auth::user()->id."]")

		<div class="pull-right">
			<a href="{{ action('StockController@create') }}" class="btn btn-primary btn-xs">Grondstof type toevoegen</a>
		</div>

		@endif

		<table class="table">
			<thead>
				<tr>
					<td>Naam</td><td>In voorraad</td> <td>#</td> <td>Actie</td>
				</tr>
			</thead>

			@foreach($stockTypes as $type)
				<tr>
					<td>{{ $type->type }} </td>
					<td>{{ $type->stock->tonnage }} </td>
					<td>

						<a class="btn btn-primary" href="{{ action('StockController@increase', $type->stock->id) }}">+</a>

						<a class="btn btn-primary" href="{{ action('StockController@decrease', $type->stock->id) }}">-</a>

					</td>
					<td><a href="{{ action('StockController@edit', $type->id)}}" class="btn btn-warning btn-xs">Aanpassen</a> <a href="{{ action('StockController@destroy', $type->id)}}" class="btn btn-danger btn-xs">Verwijderen</a> </td>
				</tr>
			@endforeach
		</table>

	</div>

@endsection
@else
	@include('layouts.noaccess')
@endif
