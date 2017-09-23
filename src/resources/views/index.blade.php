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
            <h2 class="no-margin-bottom">Dashboard</h2>
        </div>
        </header>
        <br>    
        <!-- Projects Section-->
        <section class="projects no-padding-top">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project">
            <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="text">
                    <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                    </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">Last update Today at 4:24 AM</span></div>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                <div class="project-progress">
                    <div class="progress">
                    <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Project-->
            <div class="project">
            <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="img/project-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="text">
                    <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                    </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                <div class="project-progress">
                    <div class="progress">
                    <div role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Project-->
            <div class="project">
            <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="img/project-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="text">
                    <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                    </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                <div class="project-progress">
                    <div class="progress">
                    <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Project-->
            <div class="project">
            <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="img/project-4.jpg" alt="..." class="img-fluid"></div>
                    <div class="text">
                    <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                    </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                </div>
                <div class="right-col col-lg-6 d-flex align-items-center">
                <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                <div class="project-progress">
                    <div class="progress">
                    <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
    </div>
</div>
@endsection
