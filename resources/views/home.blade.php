@extends('layouts.app')
<!-- Indien de user een admin is OF als het een "normal" user is met optie 1 ingeschakeld wordt deze content getoond. -->

@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "1") && $account_id = "[".Auth::user()->id."]")

@section('content')
<div class="container">
    <div class="container">
       <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
        <div class="row">
            <div class="col-sm-6">
                @include('silos.partials.prime')
            </div>

            <div class="col-sm-6">
                @include('silos.partials.waste')
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
@else
    @include('layouts.noaccess')
@endif
