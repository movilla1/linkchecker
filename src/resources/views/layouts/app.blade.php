<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Font Awesome CDN-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
</head>

<body>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<!-- Page Footer-->
<footer class="main-footer">
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-6">
        <p>Elcan Software &copy; 2017-2019</p>
    </div>
    <div class="col-sm-6 text-right">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    </div>
    </div>
</div>
</footer>
</html>
