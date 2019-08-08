<!DOCTYPE html>
<html>
<title>Welcome Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button"><b>MZ</b> Gestion des Personnels</a>
        <!-- Float links to the right. Hide them on small screens -->
        @if (Route::has('login'))
        <div class="w3-right w3-hide-small">
            @auth
                <a href="{{ url('/home') }}" class="w3-bar-item w3-button">Home</a>
            @else
                <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
            @endauth
        </div>
        @endif
    </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="{{asset('img/architect.jpg')}}" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
        <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>MZ</b></span> <span class="w3-hide-small w3-text-light-grey">Gestion des Personnels</span></h1>
    </div>
</header>
<!-- content -->


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
    <p>Powered by <a href="#" title="MZ" class="w3-hover-text-green">SOFTWARE</a></p>
</footer>

</body>
</html>

