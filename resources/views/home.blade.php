@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
       <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
        <div class="row">
            <div class="col-sm-6">
                <!-- START PRIME SILOS -->
                <div class="block">
                    
                    <h1 class="block__title">PRIME Silos</h1>

                    <div class="block__body">

                        @foreach( $prime_silos as $p_silo )

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
                <!-- END PRIME SILOS -->
            </div>

            <div class="col-sm-6">
                
                <!-- START WASTE SILOS -->
                <div class="block">
                    <h1 class="block__title">WASTE Silos</h1>

                    <div class="block__body">

                        @foreach( $waste_silos as $w_silo )

                        <a class="silo" href="{{ action('SilosController@edit', [$w_silo->silo->id]) }}">
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
                <!-- END WASTE SILOS -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <!-- START STOCK -->
                <div class="block">
                    <h1 class="block__title">Stock</h1>

                    <div class="block__body">
                        <div class="row"></div>
                    </div>
                </div>
                <!-- END STOCK -->
            </div>

            <div class="col-sm-6">
                <!-- START ADVANCED_DATA -->
                <div class="block">
                    <h1 class="block__title">Advanced Data</h1>

                    <div class="block-body">
                        <div class="row"></div>
                    </div>
                </div>
                <!-- END ADVANCED_DATA -->
            </div>
        </div>
    </div>
</div>
@endsection