@extends('layouts.app')

@if(Auth::user()->account_type == "admin" || Auth::user()->account_type == "normal" && strpos($account_options, "7") && $account_id = "[".Auth::user()->id."]")

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<table class="table">
			<thead>
				<tr>
					<td class="users--name">Naam</td><td>Dashboard bekijken</td><td>Blokken stock bekijken</td><td>Blokken stock beheren</td><td>Grondstof- en afvalsilos bekijken</td><td>Afvalsilos beheren</td><td>Grondstofsilos beheren</td><td>Gebruikers beheren</td>
				</tr>
			</thead>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<form class="" action="{{ URL('/profiel/UpdateUser') }}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="text" style="display:none" name="userId" value="{{$user->id}}">
						<td><input type="checkbox" name="options[]" id="optie1" value="1" /></td>
						<td><input type="checkbox" name="options[]" id="optie2" value="2" /></td>
						<td><input type="checkbox" name="options[]" id="optie3" value="3" /></td>
						<td><input type="checkbox" name="options[]" id="optie4" value="4" /></td>
						<td><input type="checkbox" name="options[]" id="optie5" value="5" /></td>
						<td><input type="checkbox" name="options[]" id="optie6" value="6" /></td>
						<td><input type="checkbox" name="options[]" id="optie7" value="7" /></td>
						<td><input type="submit" name="submit" class="btn btn-success btn-xs" id="updateUser_submit" value="Rechten aanpassen"></td>
					</form>
					<td><a href="{{ action('ProfileController@DeleteUser', [$user->id])}}" class="btn btn-danger btn-xs">Gebruiker verwijderen</a></td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection
@else
	@include('layouts.noaccess')
@endif
