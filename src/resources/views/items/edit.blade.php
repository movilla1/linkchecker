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
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
@include("items._form",["route"=>array('items.update', $item->id), "project"=>$project,"item"=>$item,"method"=>'patch'])
</div>
@endsection