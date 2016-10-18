@extends('layouts.app')

<!--@include('silos.nav')-->

@section('content')

	<div class="container">
		<div class="row">
                <div class="col-sm-6">
                    @include('silos.partials.prime')
                </div>
                <div class="col-sm-6">
                    @include('silos.partials.waste')
                </div>
            </div>
        </div>

@endsection