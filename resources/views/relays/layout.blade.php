<!DOCTYPE html>
<html>
<head>
    <title>Relays</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<b> HEATING </b>

<p>
   <a href="{{ url('rooms') }}">Rooms</a>
   <a href="{{ url('sensors') }}">Sensors</a>
   <a href="{{ url('relays') }}">Relays</a>
   <a href="{{ url('global_settings') }}">Global Settings</a>
</p>

<div class="container">
    @yield('content')
</div>
   
</body>
</html>
