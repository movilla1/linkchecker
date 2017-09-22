@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1">#</div>
    <div class="col-md-4">Title</div>
    <div class="col-md-5">Link</div>
    <div class="col-md-2">Operations</div>
  </div>
@foreach $projects as $k=>$projects
  <div class="row row-color-<?=$k%2?>">
    <div class="col-md-1"><?= $project->id ?></div>
    <div class="col-md-4"><?= $project->title ?></div>
    <div class="col-md-5"><?= $project->link ?></div>
    <div class="col-md-2">OP</div>
  </div>
@endforeach
</div>
@endsection