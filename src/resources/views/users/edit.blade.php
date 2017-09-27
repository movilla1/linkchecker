@extends('layouts.page')
@section('page-title')
    Edit User
@endsection
@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
  @include("users._form",["route"=>array('users.update', $user->id),"user"=>$user,"method"=>'patch'])
</div>
@endsection