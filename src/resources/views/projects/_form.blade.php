
{!! Form::model($project, array('route' =>$route,'method'=>$method)) !!}
  @if(isset($project->id))
    <div class="row">
      <div class="col-md-1 offset-md-1">Id</div>
      <div class="col-md-8">{{$project->id}}</div>
    </div>
    <br>
  @endif

  <div class="row">
    <div class="col-md-1 offset-md-1">Title</div>
    <div class="col-md-8"><input type="text" class="inputbox" size="40" name="title" value="{{$project->title}}"/></div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1">Link</div>
    <div class="col-md-8"><input type="text" class="inputbox" size="40" name="link" value="{{$project->link}}"/></div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-4 offset-md-2">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Cancel</button>
    </div>
  </div>
</script>