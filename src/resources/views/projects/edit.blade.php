@extends('layouts.page')
@section('page-title')
    Edit Project
@endsection
@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
  @include("projects._form",["route"=>array('projects.update', $project->id),"project"=>$project,"method"=>'patch'])
</div>
@endsection