@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>Show Project</h1></div>
  </div>
  <div class="row">
    <div class="col-md-2">id</div>
    <div class="col-md-8">{{$project->id}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Title</div>
    <div class="col-md-8">{{$project->title}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Link</div>
    <div class="col-md-8">{{$project->link}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Operations</div>
    <div class="col-md-8">
      <button>Edit</button>
      <button>Delete</button>
    </div>
  </div>
</div>
@endsection