
{{ Form::model($project, array('route' =>$route,'method'=>$method)) }}
  @if(isset($project->id))
    <div class="row">
      <div class="col-md-1 offset-md-1">Id</div>
      <div class="col-md-8">{{$project->id}}</div>
    </div>
    <br>
  @endif

  <div class="row">
    <div class="col-md-1 offset-md-1">Title</div>
    <div class="col-md-8">
      {{Form::text("title",null,["class"=>"inputbox","size"=>"50"])}}</div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1">Link</div>
    <div class="col-md-8">
      {{ Form::text("link",null,["class"=>"inputbox","size"=>"70"])}}
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-2 offset-md-2">
     {{Form::submit("Save")}}
    </div>
    <div class="col-md-4">
      <a class="btn btn-secondary" href="{{route("projects.index") }}" id="cancel">Cancel</a>
    </div>
  </div>
  {{ Form::close() }}
</script>