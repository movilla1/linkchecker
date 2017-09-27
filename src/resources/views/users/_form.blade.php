
{{ Form::model($user, array('route' =>$route,'method'=>$method)) }}
  @if(isset($user->id))
    <div class="row">
      <div class="col-md-1 offset-md-1">Id</div>
      <div class="col-md-8">{{$user->id}}</div>
    </div>
    <br>
  @endif

  <div class="row">
    <div class="col-md-1 offset-md-1">Name</div>
    <div class="col-md-8">
      {{Form::text("name",null,["class"=>"inputbox","size"=>"50"])}}</div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1">Email</div>
    <div class="col-md-8">
      {{ Form::text("email",null,["class"=>"inputbox","size"=>"70"])}}
    </div>
  </div>
  <br>
  <div class="row">
    @if(isset($user->id))
      <div class="col-md-2 offset-md-1">New password</div>
      <div class="col-md-7">
          {{ Form::text("new_password", null, ["class"=>"inputbox","size"=>"58"])}}
      </div>
    @else
      <div class="col-md-1 offset-md-1">Password</div>
      <div class="col-md-8">
          {{ Form::text("password", null, ["class"=>"inputbox","size"=>"70"])}}
      </div>
    @endif
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1 pt-2">Role</div>
    <div class="col-md-8">
      {{ Form::select('role', array(2 => 'Admin', 1 => 'User'), !isset($user->id) ? 1 : ($user->hasRole('admin') ? 2 : 1)) }}
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1 pt-2">Status</div>
    <div class="col-md-8">
      {{ Form::select('active', array(1 => 'Active', 0 => 'Blocked'), !isset($user->id) ? 1 : $user->active) }}
    </div>
  </div>
  <br>
  <br>

  <div class="row">
    <div class="col-md-2 offset-md-2">
     {{Form::submit("Save", ['class' => 'btn btn-primary'])}}
    </div>
    <div class="col-md-4">
      <a class="btn btn-secondary" href="{{route("users.index") }}" id="cancel">Cancel</a>
    </div>
  </div>
  {{ Form::close() }}
</script>