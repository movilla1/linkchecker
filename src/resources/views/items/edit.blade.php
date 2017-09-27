@extends('layouts.page')
@section("page-title")
  Items - Edit Item
@endsection
@section('actions')
  <div class="actions">
  @if($project)
    <a href="{{route('items.create',['project_id'=>$project->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  @else 
    <a href="{{route('items.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  @endif
  </div>
@endsection
@section('page-content')
<div class="container-fluid">
@include("items._form",["route"=>array('items.update', $item->id), "project"=>$project,"item"=>$item,"method"=>'patch'])
</div>
@endsection