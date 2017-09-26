@extends('layouts.page')
@section("page-title")
    Items - Create Item
@endsection

@section('page-content')
<div class="container-fluid">
  @include("items._form",["route"=>array('itemchecker.update', $item->id),"item"=>$item,"method"=>'patch'])
</div>
@endsection