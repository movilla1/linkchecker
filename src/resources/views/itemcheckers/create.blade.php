@extends('layouts.page')
@section('page-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>Create Item</h1></div>
  </div>
  @include("projects._form",["route"=>array('itemchecker.update', $item->id),"item"=>$item,"method"=>'patch'])
</div>
@endsection