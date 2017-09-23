@extends('layouts.app')

@section('content')
<div class="page home-page">
    <!-- Main Navbar-->
    <header class="header">
    <nav class="navbar">
        <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
            <!-- Navbar Header-->
            <div class="navbar-header">
            <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                <div class="brand-text brand-big hidden-lg-down"><span>BackLink</span><strong>Checker</strong></div>
                <div class="brand-text brand-small"><strong>BLC</strong></div></a>
            <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
            </div>
            <!-- Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- User profile -->
            <li class="nav-item"><a href="login.html" class="nav-link logout">Mark Stephen</a></li>
            <!-- Logout    -->
            <li class="nav-item"><a href="login.html" class="nav-link logout"><i class="fa fa-sign-out"></i></a></li>
            </ul>
        </div>
        </div>
    </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->

            <!-- Sidebar Navidation Menus-->
            <ul class="list-unstyled">
            <li class="active"> <a href="./"><i class="icon-home"></i>Home</a></li>
            <li> <a href="charts.html"> <i class="fa fa-users"></i>Users </a></li>
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Projects </a>
                <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                <li><a href="#">Page 4</a></li>
                </ul>
            </li>
        </nav>
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">@yield('page-title')</h2>
            </div>
            </header>
            <br>    
            @yield('page-content')
        </div>
    </div>
</div>
@endsection
