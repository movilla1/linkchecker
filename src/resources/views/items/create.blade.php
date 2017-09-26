@extends('layouts.page')
@section("page-title")
    Items - Create Item for: {{$project->title}}
@endsection

@section('page-content')
<div class="container-fluid">
  @include("items._form",["route"=>array('items.store', $item->id), "project"=>$project,"item"=>$item,"method"=>'post'])
</div>
@endsection