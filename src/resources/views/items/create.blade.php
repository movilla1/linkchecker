@extends('layouts.page')
@section("page-title")
    Items - Create Item
@endsection

@section('page-content')
<div class="container-fluid">
  @include("items._form",["route"=>array('items.store', $item->id),"item"=>$item,"method"=>'post'])
</div>
@endsection