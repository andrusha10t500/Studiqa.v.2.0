<DOCTYPE html />
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

    {{--<link rel="stylesheet" href="zoom/nivo-zoom.css" type="text/css" media="screen">--}}
    <link rel="stylesheet" href="zoom.1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="zoom.1/css/jquery.littlelightbox.css">
    <link rel="stylesheet" href="">

    <link href="css/jquery.littlelightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/app.css">

</head>
@include('includes.header')
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="zoom.1/js/jquery.littlelightbox.js"></script>
    <script src="src/js/app.js"></script>

    <div class="container-fluid">
        @yield('content')
    </div>

</body>
</html>
