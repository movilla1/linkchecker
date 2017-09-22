@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>New Project</h1></div>
  </div>
  @include("projects._form",["route"=>array('projects.store'),"project"=>$project,"method"=>"post"])
</div>
@endsection