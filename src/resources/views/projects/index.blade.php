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
            <div class="left-col col-lg-8 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="text">
                <h3 class="h4">{{ $project->title }}</h3><small>{{$project->link}}</small>
              </div>
            </div>
            <div class="user"><span class="hidden-sm-down"><i class="fa fa-user"></i>&nbsp;&nbsp;Mark Stephen</span></div>
            </div>
            <div class="right-col col-lg-4 d-flex align-items-center">
              <div class="actions"><a class="btn btn-sm btn-success" href="{{route("projects.show",['id'=> $project->id]) }}"><i class="fa fa-check"></i>&nbsp;Check</a></div>
              <div class="actions"><a class="btn btn-sm btn-info" href="{{route('projects.edit',['id'=>$project->id]) }}"><i class="fa fa-pencil"></i>&nbsp;Edit</a></div>
              <div class="actions"><a class="btn btn-sm btn-danger" href="{{route('projects.destroy',['id'=>$project->id]) }}" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i>&nbsp;Delete</a></div>
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
