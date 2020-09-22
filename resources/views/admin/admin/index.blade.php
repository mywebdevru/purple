<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<div id="app-loading" class="d-flex justify-content-center app-loading">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div><h4>Загрузка</h4>
</div>

<body class="left-side-menu-dark">
<div id="app">
    <index></index>
</div>

<!-- Scripts -->
{{--<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4ff599c52e3d67dea909', {
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('my-channel');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('my-event', function(data) {
        console.log(data);
    });
</script>--}}
</body>
</html>
