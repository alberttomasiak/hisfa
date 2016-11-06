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



		<div class="col-sm-6 col-sm-6_nieuweUser">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fx-bold">Nieuwe gebruiker toevoegen</span>
				</div>
				<div class="panel-body">
					<div class="row userrow">
						<!-- NIEUWE GEBRUIKER TOEVOEGEN -->
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
								@if(Session::has('user-' . $msg))
									<p class="alert alert-{{ $msg }}">{{ Session::get('user-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
								 @endif
						@endforeach

						@if(Auth::user()->account_type == "admin")
						<form class="" action="{{ URL('/profiel/addUser')}}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<label for="name">Naam</label>
							<input type="text" name="name" value="" placeholder="Naam">

							<label for="email">Email</label>
							<input type="text" name="email" placeholder="Email" value="">

							<label for="password">Wachtwoord</label>
							<input type="password" name="password" placeholder="Wachtwoord" value="">

							<label for="passwordRepeat">Wachtwoord herhalen</label>
							<input type="password" name="passwordRepeat" placeholder="Wachtwoord herhalen" value="">

							<p>
								Welke rollen moet deze gebruiker hebben?
							</p>

							<input type="checkbox" name="options[]" id="optie1" value="1" />
							<label for="optie1">Dashboard bekijken</label>

							<input type="checkbox" name="options[]" id="optie2" value="2" />
							<label for="optie2">Blokken stock bekijken</label>

							<input type="checkbox" name="options[]" id="optie3" value="3" />
							<label for="optie3">Blokken stock beheren</label>

							<input type="checkbox" name="options[]" id="optie4" value="4" />
							<label for="optie4">Grondstof- en afvalsilos bekijken</label>

							<input type="checkbox" name="options[]" id="optie5" value="5" />
							<label for="optie5">Afvalsilos beheren</label>

							<input type="checkbox" name="options[]" id="optie7" value="6" />
							<label for="optie7">Grondstofsilos beheren</label>

							<input type="checkbox" name="options[]" id="optie8" value="7" />
							<label for="optie8">Gebruikers beheren</label>

							<input type="submit" name="submit" class="submit btn btn-primary" id="userAdd_submit" value="User toevoegen">

						</form>
					@endif
					@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "7") && $account_id = "[".Auth::user()->id."]")
						<a href="/profiel/gebruikers-beheren">Beheer de gebruikers</a>
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
