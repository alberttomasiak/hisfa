@extends('layouts.app')

@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "2") && $account_id = "[".Auth::user()->id."]")

@section('content')

	<div class="col-md-8 col-md-offset-2 stock">

		@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "3") && $account_id = "[".Auth::user()->id."]")

		<div class="add-items">
			<a href="{{ action('StockController@create') }}" class="btn btn-add btn-xs">Grondstof type toevoegen</a>
		</div>

		@endif

		<div class="table">
			<div class="tr table-header">
				<div class="flex1">Type</div>
				<div class="flex3">In voorraad</div>
				<div class="flex1">Actie</div>
			</div>
			@foreach($stockTypes as $type)
				<div class="tr table-data">
					<div class="flex1">{{ $type->type }}</div>
					<div class="flex3">{{ $type->stock->tonnage }}</div>
					<div class="flex1">
						<a href="{{ action('StockController@edit', $type->id)}}" class="btn btn-default btn-edit btn-sm">Aanpassen</i></a>
						<a href="{{ action('StockController@destroy', $type->id)}}" class="btn btn-danger btn-sm">Verwijderen</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection
@else
	@include('layouts.noaccess')
@endif
