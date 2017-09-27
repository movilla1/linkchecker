@extends('layouts.app')

@section('content')
<div class="page">
    <!-- Main Navbar-->
    <header class="header">
    <nav class="navbar">
        <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
            <!-- Navbar Header-->
            <div class="navbar-header">
            <!-- Navbar Brand --><a href="/" class="navbar-brand">
                <div class="brand-text brand-big hidden-lg-down"><span>BackLink</span><strong>Checker</strong></div>
                <div class="brand-text brand-small"><strong>BLC</strong></div></a>
            <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
            </div>
            <!-- Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- User profile -->
            <li class="nav-item">{{ Auth::user()->name }}</li>
            <!-- Logout    -->
            <li class="nav-item"><a href="/logout" class="nav-link logout"><i class="fa fa-sign-out"></i></a></li>
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
            <li><a href="/"><i class="icon-home"></i>Home</a></li>
            @if(Auth::user()->hasRole("admin"))
                <li><a href="{{route('users.index') }}"> <i class="fa fa-users"></i>Users </a></li>
                <li><a href="{{route('trash')}}"> <i class="fa fa-trash"></i>Trash </a></li>
            @endif
            <li><a href="{{route('projects.index') }}"> <i class="icon-interface-windows"></i>Projects</a></li>
            <li><a href="{{route('items.index') }}"> <i class="fa fa-external-link"></i>Items</a></li>
        </nav>
        <div class="content-inner">
         <?php $notice = \Request::input("notice",false); ?>
            <div class="row">
                @if($notice)
                  <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{$notice}}
                    </div>
                  </div>
                @endif
            </div>
            <!-- Page Header-->
            <header class="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <h2 class="no-margin-bottom">@yield('page-title')</h2>
                    </div>
                    <div class="col-sm-2">
                        @yield('actions')
                    </div>
                </div>
            </div>
            </header>
            <br>    
            @yield('page-content')
            <br>
        </div>
    </div>
</div>
<!-- Page Footer-->
<footer class="main-footer">
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-6">
        <p>Zaitek &copy; 2017</p>
    </div>
    <div class="col-sm-6 text-right">
        <p>Developed by <a href="http://www.elcansoftware.com">Elcan Software</a> - Design based on <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)--></p>
    </div>
    </div>
</div>
</footer>
@endsection
