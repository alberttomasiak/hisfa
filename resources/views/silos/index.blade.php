@extends('layouts.app')

<!--@include('silos.nav')-->

@section('content')

	<div class="container">
		<div class="row">
                <div class="col-sm-6">
                    <div class="silos">
                        <h1 class="silos__title">PRIME Silos</h1>

                        <div class="silos__body">

                            @foreach( $prime_silos as $p_silo )
                            <!--
                                Code to destroy a silo
                                <a class="btn btn-danger" href="{{ action('SilosController@destroy', [$p_silo->silo->id]) }}">Verwijder deze silo</a>
                            -->
                            <a class="silo" href="{{ action('SilosController@edit', [$p_silo->silo->id]) }}">
                                <div class="silo-inner">
                                    <div class="silo__image">
                                        <div class="silo__image__top default"></div>
                                        <div class="silo__image__middle medium"></div>
                                        <div class="silo__image__bottom medium"></div>
                                        <div class="silo__percentage">{{ intval($p_silo->silo->volume) }}%</div>
                                    </div>
                                    <div class="silo__number">1</div>
                                </div>
                            </a>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="silos">
                        <h1 class="silos__title">WASTE Silos</h1>

                        <div class="silos__body">

                            @foreach( $waste_silos as $w_silo )

                            <a class="silo" href="{{ action('SilosController@edit', [$p_silo->silo->id]) }}">
                                <div class="silo-inner">
                                    <div class="silo__image">
                                        <div class="silo__image__top default"></div>
                                        <div class="silo__image__middle default"></div>
                                        <div class="silo__image__bottom empty"></div>
                                        <div class="silo__percentage">{{ intval($w_silo->silo->volume) }}%</div>
                                    </div>
                                    <div class="silo__number">1</div>
                                </div>
                            </a>

                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection