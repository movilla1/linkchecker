@extends('layouts.page')
@section('page-title')
    Home
@endsection

@section('page-content')
<div class="container-fluid pt-4 pb-4 bg-white has-shadow">
    <h1>Welcome</h1>
    <p>Please use the option on the sidebar to work with the system.</p>
    <p>If you have any problems, please contact the <a href="mailto: {{env('WEBMASTER_EMAIL')}}">webmaster</a></p>
</div>
@endsection
