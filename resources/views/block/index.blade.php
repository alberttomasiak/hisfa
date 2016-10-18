@extends('layouts.app')

@section('content')
<div class="pull-right">
	<a href="#" class="btn btn-primary btn-xs">Stock Type toevoegen</a> <a href="#" class="btn btn-primary btn-xs">Stock Lengte toevoegen</a>
</div>

@include('stock.partials.table_view')

@endsection