@extends('layouts.page')
@section("page-title")
  Items    
  @if ($project) 
  - Create Item for: {{$project->title}}
  @endif
@endsection

@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
  @include("items._form",["route"=>array('items.store', $item->id), "project"=>$project,"item"=>$item,"method"=>'post',"projects"=>$projects])
</div>
@endsection