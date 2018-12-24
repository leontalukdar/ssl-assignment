<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

    <style>
        .navbar-fixed-left {
            width: 10%;
            position: fixed;
            border-radius: 0;
            height: 100%;
        }

        .navbar-fixed-left .navbar-nav > li {
            float: none;  /* Cancel default li float: left */
            width: 100%;
        }

        .navbar-fixed-left + .container {
            padding-top: 30px;
            padding-left: 100px;
        }

        /* On using dropdown menu (To right shift popuped) */
        .navbar-fixed-left .navbar-nav > li > .dropdown-menu {
            margin-top: -50px;
            margin-left: 140px;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-left">
    <ul class="nav navbar-nav">
        <li><a href={{Route('account.index')}}>Dashboard</a></li>
        <li><a href={{Route('account.entry')}}>Account Entry</a></li>
        <li><a href={{Route('product.index')}}>Product List</a></li>
        <li><a href={{Route('cart.index')}}>Cart</a></li>
        <li><a href="#">Cricket ScoreBoard</a></li>
    </ul>
</div>
<div class="container">
    @yield('content')
</div>


@yield('script')

</body>
</html>
