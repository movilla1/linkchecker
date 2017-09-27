@extends('layouts.page')
@section('page-title')
    Create User
@endsection
@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
  @include("users._form",["route"=>array('users.store'),"user"=>$user,"method"=>"post"])
</div>
@endsection