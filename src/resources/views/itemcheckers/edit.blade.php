@extends('layouts.page')
@section("page-title")
  Backlinks - Edit Item
@endsection
@section('actions')
  <div class="actions">
    <a href="{{route('items.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<div class="container-fluid">
    @include("items._form",["route"=>array('itemchecker.update', $item->id),"item"=>$item,"method"=>'patch'])
</div>
@endsection