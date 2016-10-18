@extends('layouts.app')

@section('content')

	<div class="col-md-8 col-md-offset-2">

		<div class="pull-right">
			<a href="{{ action('StockController@create') }}" class="btn btn-primary btn-xs">Grondstof type toevoegen</a>
		</div>

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