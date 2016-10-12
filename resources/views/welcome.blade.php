<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

</head>

<body>
    
    <div class="login-content">

        <div class="logo">
            <img src="/img/piepschuim_logo.svg" alt="Piepschuim logo">
        </div>
        <!--Echo out errors here. See example-->
        <!--<p class=error>Error, wrong username or password used. Please, try again.-->
        <form>
            <input type="text" name="username" placeholder="Gebruikersnaam"></input>
            <input type="password" name="password" placeholder="Wachtwoord"></input>

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
        <svg width="260px" height="100%" id="col3">
            <rect width="130px" height="130px" x="65px" y="65px" class="bubble" id="bub3" />
        </svg>
        <svg width="160px" height="100%" id="col4">
            <rect width="80px" height="80px" x="40px" y="40px" class="bubble" id="bub4" />
        </svg>
        <svg width="240px" height="100%" id="col5">
            <rect width="120px" height="120px" x="60px" y="60px" class="bubble" id="bub5" />
        </svg>
    </div>

</body>

</html>