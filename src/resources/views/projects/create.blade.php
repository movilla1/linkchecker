@extends('layouts.page')
@section('page-title')
    Create Project
@endsection
@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
  @include("projects._form",["route"=>array('projects.store'),"project"=>$project,"method"=>"post"])
</div>
@endsection