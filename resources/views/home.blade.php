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
                    <h1 class="block__title">Resources</h1>
                            <div class="table">
                    			<div class="tr table-header">
                    				<div class="flex5">Resource type</div>
                    				<div class="flex1">Ton</div>
                    			</div>

                                @foreach($resources as $resource)
                                    <div class="tr table-data">
                                        <div class="flex5">{{$resource->type}}</div>
                                        <div class="flex1">{{$resource->tonnage}}</div>
                                    </div>
                                @endforeach

                            </div>
                </div>
                <!-- END STOCK -->
            </div>

            <div class="col-sm-6">
                <!-- START ADVANCED_DATA -->
                <div class="block">
                    <h1 class="block__title">Advanced Data</h1>
                            <div class="table">
                    			<div class="tr table-header">
                    				<div class="flex1">User</div>
                    				<div class="flex1">Action</div>
                    				<div class="flex2">Details</div>
                    				<div class="flex1">Date and Time</div>
                    			</div>

                                @foreach($logs as $log)
                                    <div class="tr table-data">
                                        <div class="flex1">{{$log->user}}</div>
                                        <div class="flex1">{{$log->action}}</div>
                                        <div class="flex2">{{ucfirst($log->details)}}</div>
                                        <div class="flex1">{{$log->date}}</div>
                                    </div>
                                @endforeach

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
