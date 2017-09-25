@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><h1>Show Item</h1></div>
  </div>
  <div class="row">
    <div class="col-md-2">id</div>
    <div class="col-md-8">{{$item->id}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Website</div>
    <div class="col-md-8">{{$item->website}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Back Link</div>
    <div class="col-md-8">{{$item->backlink}}</div>
  </div>
  <div class="row">
    <div class="col-md-2">Operations</div>
    <div class="col-md-8">
      <button>Edit</button>
      <button>Delete</button>
    </div>
  </div>
</div>
@endsection