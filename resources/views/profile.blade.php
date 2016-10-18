@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="fx-bold">Persoonlijke gegevens</span></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6 profile--section--image">
							<img src="{{ Auth::user()->profilePic }}" class="profile--image" alt="{{ Auth::user()->name }}'s profiel foto">
							<a href="/profiel/instellingen">Gegevens wijzigen</a>
						</div>
						<div class="col-sm-6 profile--section--info">
							<div>
							<h6>Naam</h6>
							<p>{{ Auth::user()->name }}</p>
							</div>
							<div>
							<h6>Email</h6>
							<p>{{ Auth::user()->email }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6"> 
			<div class="panel panel-default"> 
				<div class="panel-heading"><span class="fx-bold">Meldingen/Notificaties</span></div> 
				<div class="panel-body"> 
					<div class="row"> 
						<!-- MELDINGEN & NOTIFICATIES --> 
						<form method="post" action="{{ url('/profiel') }}"> 
							<h6 class="h6_melding">Grondstofsilo bijna vol (90%)</h6> 
							<div class="slideThree"> 
								{{ Form::checkbox('grondstofsiloChecker', 'NULL', false, ['id' => 'grondstofsiloChecker']) }} 
								<!--<input type="checkbox" value="None" id="grondstofsiloChecker" name="grondstofsiloChecker"  />--> 
								<label for="grondstofsiloChecker"></label> 
							</div> 
							<h6 class="h6_melding">Afvalsilo bijna vol (90%)</h6> 
							<div class="slideThree"> 
								{{ Form::checkbox('afvalsiloChecker', 'NULL', false, ['id' => 'afvalsiloChecker']) }} 
								<label for="afvalsiloChecker"></label> 
							</div> 
						</form> 
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection

