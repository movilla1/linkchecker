@extends('layouts.page')
@section("page-title")
  Items - Edit Item
@endsection
@section('actions')
  <div class="actions">
    <a href="{{route('items.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<div class="container-fluid">
@include("items._form",["route"=>array('items.update', $item->id), "project"=>$project,"item"=>$item,"method"=>'patch'])
</div>
@endsection