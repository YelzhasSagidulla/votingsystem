<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <!-- CSS -->
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
    <h3>Your ip: {{ $_SERVER['REMOTE_ADDR'] }}</h3>
    <h3>Your device: {{ $_SERVER['HTTP_USER_AGENT'] }}</h3>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <!-- JavaScript -->
        <script src="js/app.js"></script>
    </body>
</html>
