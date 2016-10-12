@extends('layouts.app')

@include('silos.nav')

@section('content')
	<h1>Silos</h1>

	<div class="container">
		<div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<span class="fx-bold">PRIME</span> Silos

							<span class="pull-right">
								<a href="{{ action('SilosController@create', 'stock') }}">Silo Toevoegen</a>
							</span>

                        </div>

                        <div class="panel-body">
                            <div class="row">

                                

                                @foreach( $stock_silos as $s_silo )

                                <div class="col-sm-4">
                                    <div class="balk">
                                        <div class="fill" style="height: {{ $s_silo->volume }}%;">
                                            <div class="volume"> {{ $s_silo->volume }}% </div>
                                        </div>
                                    </div>
                                    <img src="img/gauge-icon.png" alt="Img" style="height: 25px;">

                                    <a class="btn btn-danger" href="{{ action('SilosController@destroy', [$s_silo->id]) }}">Verwijder deze silo</a>
                                </div>



                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">WASTE Silos
						
						<span class="pull-right">
								<a href="{{ action('SilosController@create', 'waste') }}">Silo Toevoegen</a>
							</span>
                        </div>

                        <div class="panel-body">
                            <div class="row">

                                @foreach( $garbage_silos as $g_silo )

                                <div class="col-sm-4">
                                    <div class="balk">
                                        <div class="fill" style="height: {{ $g_silo->volume }}%;">
                                            <div class="volume"> {{ $g_silo->volume }}% </div>
                                        </div>
                                    </div>
                                    <img src="img/gauge-icon.png" alt="Img" style="height: 25px;">

                                    <a class="btn btn-danger" href="{{ action('SilosController@destroy', [$g_silo->id]) }}">Verwijder deze silo</a>

                                </div>

                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection