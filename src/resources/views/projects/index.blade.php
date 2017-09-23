@extends('layouts.app')

@section('content')
<a href="{{route('projects.create')}}" class="btn btn-default">Add New</a>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>Projects</h1></div>
  </div>
  <div class="row">
    <div class="col-md-1">#</div>
    <div class="col-md-4">Title</div>
    <div class="col-md-5">Link</div>
    <div class="col-md-2">Operations</div>
  </div>
@if(count($projects) >0)
 @foreach($projects as $k=>$project)
  <div class="row row-color-{{$k%2}}">
    <div class="col-md-1">{{$project->id }}</div>
    <div class="col-md-4"><a href="{{route("projects.show",['id'=> $project->id]) }}">{{ $project->title }}</a></div>
    <div class="col-md-5"><a href="{{$project->link}}" title="Open link" target="_blank">{{$project->link}}</a></div>
    <div class="col-md-2">
      <a href="{{route('projects.edit',['id'=>$project->id])}}"><span class="icon icon-edit"></span></a>
      <a href="{{route('projects.destroy',['id'=>$project->id,'method'=>'delete'])}}"><span class="icon icon-delete"></span></a>
    </div>
  </div>
 @endforeach
@else
 <div class="row">
  <div class="col-md-12">No data</div>
 </div>
@endif
</div>
@endsection