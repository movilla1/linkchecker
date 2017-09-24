@extends('layouts.page')
@section('page-title')
Users
@endsection

@section('page-content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Available Users</h3>
    </div>
    <div class="card-body">
      @if(count($users) > 0)
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $k=>$user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @foreach($user->roles as $role)
                   {{ $role->name }} <br>
                  @endforeach
                </td>
                @if($user->active)
                  <td class="text-success">Active</td>
                @else
                  <td class="text-danger">Blocked</td>
                @endif
                <td>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-info" href="{{route('users.edit',['id'=>$user->id]) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger" href="{{route('users.destroy',['id'=>$user->id]) }}" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
      <div class="row">
        <div class="col-md-12">No data</div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
