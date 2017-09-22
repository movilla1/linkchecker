@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>Edit Project</h1></div>
  </div>
  @include("projects._form",["route"=>array('projects.update', $project->id),"project"=>$project,"method"=>'patch'])
</div>
@endsection