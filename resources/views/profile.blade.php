@extends('layouts.app')
<div class="header">
    <span class="glyphicon glyphicon-arrow-left"><a href="" class="back"></a></span>
    <div class="container">My profile</div>
</div>

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
				<div class="panel-heading"><span class="fx-bold">Meldingen & notificaties</span></div>
				<div class="panel-body">
					<div class="row">
						<!-- MELDINGEN & NOTIFICATIES -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

