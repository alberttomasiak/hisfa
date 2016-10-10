@extends('layouts.app') 

@section('content')

    <div class="login-content">

        <div class="logo">
            <img src="/img/piepschuim_logo.svg" alt="Piepschuim logo">
        </div>

        <form>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required></input>
            @if ($errors->has('email'))
            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif

            <input type="password" name="password" placeholder="Wachtwoord" required></input>
            @if ($errors->has('password'))
            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span> @endif

            <button type="submit" name="submit" class="submit">Login</button>
        </form>
    </div>

    <div class="bg-boxes">
        <svg width="300px" height="100%" id="col1">
            <rect width="150px" height="150px" x="75px" y="75px" class="bubble" id="bub1" />
        </svg>
        <svg width="200px" height="100%" id="col2">
            <rect width="100px" height="100px" x="50px" y="50px" class="bubble" id="bub2" />
        </svg>
        <!--Here is a triangle-->
        <svg width="200px" height="100%" id="col6">
            <polygon points="50,150 100,50 150,150" class="bubble" id="bub6" />
        </svg>
        <svg width="200px" height="100%" id="col7">
            <rect width="100px" height="100px" x="50px" y="50px" class="bubble" id="bub7" />
        </svg>
        <svg width="200px" height="100%" id="col8">
            <rect width="100px" height="100px" x="50px" y="50px" class="bubble" id="bub8" />
        </svg>
        <svg width="100px" height="100%" id="col11">
            <rect width="50px" height="50px" x="25px" y="25px" class="bubble" id="bub11" />
        </svg>
    </div>
@endsection