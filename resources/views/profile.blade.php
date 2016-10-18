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
						
							<h6 class="h6_melding">Grondstofsilo bijna vol (90%)</h6> 
							
							<div class="onoffswitch">
								<input type="checkbox" <?php if( Auth::user()->notification_prime == 1 ){ echo 'checked'; } ?> name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" value="{{ Auth::user()->notification_prime }}" onclick="window.location.href='{{ action('ProfileController@ClickUpdateNotification_prime') }}'" >
								<label class="onoffswitch-label" for="myonoffswitch">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
							<h6 class="h6_melding">Afvalsilo bijna vol (90%)</h6> 

						
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection

