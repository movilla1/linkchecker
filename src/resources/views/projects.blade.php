@extends('layouts.page')
@section('page-title')
    Projects
@endsection

@section('page-content')
<!-- Projects Section-->
<section class="projects no-padding-top">
<div class="container-fluid">
    @if(count($projects) > 0)
        @foreach($projects as $k=>$project)
            <div class="project">
            <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="text">
                    <h3 class="h4">{{ $project->title }}</h3><small>{{$project->link}}</small>
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
        @endforeach
    @else
    <div class="row">
    <div class="col-md-12">No data</div>
    </div>
    @endif
</div>
</section>

@endsection
