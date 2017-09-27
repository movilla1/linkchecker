@extends('layouts.page')
@section('page-title')
Users
@endsection

@section('actions')
  <div class="actions">
    <a class="btn btn-sm btn-primary" href="{{route("users.create") }}">
      <i class="fa fa-plus"></i>&nbsp;Add
    </a>
  </div>
@endsection

@section('page-content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
    </div>
    <div class="card-body">
      @if(count($users) > 0)
        <table class="table table-hover">
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
                    
                    {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['users.destroy', $user->id]
                    ]) !!}
                      <div class="btn-group">
                        <a class="btn btn-sm btn-info" href="{{route('users.edit',['id'=>$user->id]) }}"><i class="fa fa-pencil"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></button>
                      </div>
                    {!! Form::close() !!}
                    
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
