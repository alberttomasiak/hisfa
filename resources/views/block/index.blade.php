@extends('layouts.app')

@section('content')

<style>
.hm {
	padding: 1em;
	margin: .5em 0;
}

.hm .inner {
	padding: .5em;
	background: white;
}

.hm .inner .row {
	background: none;
}
</style>

{{-- dd( $blocks ) --}}

<div class="row">
<?php $i=0; ?>
@foreach( $blocks as $block )
	<?php $i++ ?>
	<div class="col-md-3 hm" >
		<div class="inner">
		<h4>{{  $block->name  }} <a href="" class="pull-right">+</a></h4>

		@foreach( $block->length as $length)
		<div class="row"> 
			<div class="col-md-6">
				{{ $length->length/1000 }}m ({{ $length->stock }})
			</div>
			<div class="col-md-6" style="text-align: right">
				<a href="">Edit</a> <a href="">Delete</a>
			</div>
		</div>
		@endforeach
		</div>
	</div>
	@if( $i % 4 == 0)
	</div>
	<div class="row">
	@endif
@endforeach
</div>

@endsection
