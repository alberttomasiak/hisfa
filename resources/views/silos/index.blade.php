@extends('layouts.app')

<!--@include('silos.nav')-->

@section('content')

	<div class="container">
		<div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<span class="fx-bold">PRIME</span> Silos

							<span class="pull-right">
								<a href="{{ action('SilosController@create', 'prime') }}">Silo Toevoegen</a>
							</span>

                        </div>

                        <div class="panel-body">
                            <div class="row">

                                

                                @foreach( $prime_silos as $p_silo )

                                <div class="col-sm-4">
                                    <div class="balk">
                                        <div class="fill" style="height: {{ $p_silo->silo->volume }}%;">
                                            <div class="volume"> {{ $p_silo->silo->volume }}% </div>
                                        </div>
                                    </div>
                                    <img src="img/gauge-icon.png" alt="Img" style="height: 25px;">

                                    <a class="btn btn-danger" href="{{ action('SilosController@destroy', [$p_silo->silo->id]) }}">Verwijder deze silo</a>
                                    <a class="btn btn-warning" href="{{ action('SilosController@edit', [$p_silo->silo->id]) }}">Silo aanpassen</a>
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

                                @foreach( $waste_silos as $w_silo )

                                <div class="col-sm-4">
                                    <div class="balk">
                                        <div class="fill" style="height: {{ $w_silo->silo->volume }}%;">
                                            <div class="volume"> {{ $w_silo->silo->volume }}% </div>
                                        </div>
                                    </div>
                                    <img src="img/gauge-icon.png" alt="Img" style="height: 25px;">

                                    <a class="btn btn-danger" href="{{ action('SilosController@destroy', [$w_silo->silo->id]) }}">Verwijder deze silo</a>
                                    <a class="btn btn-warning" href="{{ action('SilosController@edit', [$w_silo->silo->id]) }}">Silo aanpassen</a>

                                </div>

                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection