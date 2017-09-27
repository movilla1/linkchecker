@extends('layouts.page')
@section('page-title')
  Projects
@endsection

@section('actions')
  <div class="actions">
    <a class="btn btn-sm btn-primary" href="{{route("projects.create") }}">
      <i class="fa fa-plus"></i>&nbsp;Add
    </a>
  </div>
@endsection

@section('page-content')
<!-- Projects Section-->
<section class="projects no-padding-top">
  <div class="container-fluid">
  @if(count($projects) > 0)
    @foreach($projects as $k=>$project)
      @include("projects._project_item",["project"=>$project, "route"=>"projects.destroy"])
    @endforeach
  @else
    <div class="row">
    <div class="col-md-12">No data</div>
    </div>
  @endif
</div>
</section>
@endsection
