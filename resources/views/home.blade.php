@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
       <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
        <div class="row">
            <div class="col-sm-6">
                <div class="silos">
                    
                    <h1 class="silos__title">PRIME Silos</h1>

                    <div class="silos__body">

                        @foreach( $prime_silos as $p_silo )

                        <div class="silo">
                            <div class="silo-inner">
                                <div class="silo__image">
                                    <div class="silo__image__top default"></div>
                                    <div class="silo__image__middle medium"></div>
                                    <div class="silo__image__bottom medium"></div>
                                    <div class="silo__percentage">{{ intval($p_silo->silo->volume) }}%</div>
                                </div>
                                <div class="silo__number">1</div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="silos">
                    <h1 class="silos__title">WASTE Silos</h1>

                    <div class="silos__body">

                        @foreach( $prime_silos as $p_silo )

                        <div class="silo">
                            <div class="silo-inner">
                                <div class="silo__image">
                                    <div class="silo__image__top default"></div>
                                    <div class="silo__image__middle default"></div>
                                    <div class="silo__image__bottom empty"></div>
                                    <div class="silo__percentage">{{ intval($p_silo->silo->volume) }}%</div>
                                </div>
                                <div class="silo__number">1</div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Stock</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="../../public/img/gauge-icon.png" alt="Img">
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Advanced data</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="../../public/img/gauge-icon.png" alt="Img">
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection