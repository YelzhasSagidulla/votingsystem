<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>
        <title>Laravel App</title>

        <!-- CSS -->
        <link href="css/app.css" rel="stylesheet">

    </head>
    <body>

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
