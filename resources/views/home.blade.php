@extends('layouts.app')
   <div class="header">
    <div class="container">Dashboard</div>
</div>

@section('content')

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="fx-bold">PRIME</span> Silos</div>

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

                                @foreach( $garbage_silos as $g_silo )

                                <div class="col-sm-4">
                                    <div class="balk">
                                        <div class="fill" style="height: {{ $g_silo->volume }}%;">
                                            <div class="volume"> {{ $g_silo->volume }}% </div>
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
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Dashboard</div>--}}

    {{--<div class="panel-body">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
