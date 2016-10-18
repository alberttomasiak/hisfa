@extends('layouts.app')
<div class="header">
    <div class="container">Profile settings</div>
</div>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="fx-bold">Profiel gegevens</span></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
						<h3>Persoonlijke gegevens</h3>
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
      							@if(Session::has('alert-' . $msg))

      								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
     							 @endif
    						@endforeach
							<form method="POST" action="{{ url('/profiel/instellingen/persoonlijk') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<label for="name">Naam</label></br>
								<input type="text" name="name" id="name" class="form-control" placeholder="Naam" value="{{ Auth::user()->name }}" required><br/>
								
								<label for="email">Email</label><br/>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" required><br/>
								
								<input type="submit" name="submit" class="submit btn btn-primary" id="profile_submit" value="Verzenden">
							</form>
						</div>
						<div class="col-sm-6">
						<h3>Profiel foto</h3>
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
      							@if(Session::has('avatar-' . $msg))
      								<p class="alert alert-{{ $msg }}">{{ Session::get('avatar-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
     							 @endif
     					@endforeach
							<form method="post" enctype="multipart/form-data" action="{{ URL::to('/profiel/instellingen/avatar') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<img src="../{{ Auth::user()->profilePic }}" class="profile--image" alt="{{ Auth::user()->name }}'s profiel foto">
								
								<!--<label class="btn btn--secondary" for="profileImage">Selecteer een nieuwe profielfoto</label>-->
							<input type="file" name="file" id="profileImage" class="fileToUpload" id="avatarUpload"><br/>
							
							<input type="submit" name="submit" class="submit--image btn btn-primary" id="profile_avatar_submit" value="Profielfoto wijzigen">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="fx-bold">Account gegevens</span></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
						<h3>Wachtwoord wijzigen</h3>
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
      							@if(Session::has('password-' . $msg))
      								<p class="alert alert-{{ $msg }}">{{ Session::get('password-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
     							 @endif
     					@endforeach
							<form method="POST" action="{{ url('/profiel/instellingen/wachtwoord') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<label for="currentPass">Huidig wachtwoord</label><br/>
								<input type="password" name="currentPass" id="currentPass" class="form-control" required><br/>
								
								<label for="newPass">Nieuw wachtwoord</label><br/>
								<input type="password" name="newPass" id="newPass" class="form-control" required><br/>
								
								<label for="newPassRepeat">Bevestig nieuw wachtwoord</label><br/>
								<input type="password" name="newPassRepeat" id="newPassRepeat" class="form-control" required><br/>
								
								<input type="submit" name="submit" class="submit btn btn-primary" id="account_submit" value="Verzenden">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
