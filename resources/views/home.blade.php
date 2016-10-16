@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
       <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                  
                   
                    <div class="panel-heading"><span class="fx-bold">PRIME</span> Silos</div>

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
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">WASTE Silos</div>

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

                            </div>

                            @endforeach

                        </div>
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