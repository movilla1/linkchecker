@extends('layouts.page')
@section('page-title')
    Edit User
@endsection
@section('page-content')
<div class="container-fluid">
  @include("users._form",["route"=>array('users.update', $user->id),"user"=>$user,"method"=>'patch'])
</div>
@endsection