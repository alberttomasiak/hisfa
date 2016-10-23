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
							<h6 class="profielNaam-Email">Naam: <span><a href="/profiel/instellingen">{{ Auth::user()->name }}</a></span></h6>
							</div>
							<div>
							<h6 class="profielNaam-Email">Email: <span><a href="/profiel/instellingen">{{ Auth::user()->email }}</a></span></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-sm-6_meldingen"> 
			<div class="panel panel-default"> 
				<div class="panel-heading"><span class="fx-bold">Meldingen/Notificaties</span></div> 
				<div class="panel-body"> 
					<div class="row meldingrow"> 
						<!-- MELDINGEN & NOTIFICATIES --> 
						
							<h6 class="h6_melding">Grondstofsilo bijna vol (90%):</h6> 

								<div class="primeSwitch">
									<input type="checkbox" <?php if( Auth::user()->notification_prime == 1 ){ echo 'checked'; } ?> name="primeSwitch" class="primeSwitch-checkbox" id="primeSwitch" value="{{ Auth::user()->notification_prime }}" onclick="window.location.href='{{ action('ProfileController@ClickUpdateNotification_prime') }}'" >
									<label class="primeSwitch-label" for="primeSwitch">
										<span class="primeSwitch-inner"></span>
										<span class="primeSwitch-switch"></span>
									</label>
								</div>

							<h6 class="h6_melding">Afvalsilo bijna vol (90%):</h6> 

								<div class="wasteSwitch">
									<input type="checkbox" <?php if( Auth::user()->notification_waste == 1 ){ echo 'checked'; } ?> name="wasteSwitch" class="wasteSwitch-checkbox" id="wasteSwitch" value="{{ Auth::user()->notification_waste }}" onclick="window.location.href='{{ action('ProfileController@ClickUpdateNotification_waste') }}'" >
									<label class="wasteSwitch-label" for="wasteSwitch">
										<span class="wasteSwitch-inner"></span>
										<span class="wasteSwitch-switch"></span>
									</label>
								</div>
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection

