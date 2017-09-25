
{!! Form::model($project, array('route' =>$route,'method'=>$method)) !!}
@if(isset($project->id))
  <div class="row">
    <div class="col-md-1">id</div>
    <div class="col-md-8">{{$project->id}}</div>
  </div>
@endif

  <div class="row">
    <div class="col-md-1">Title</div>
    <div class="col-md-8"><input type="text" class="inputbox" size="50" name="title" value="{{$project->title}}"/></div>
  </div>
  <div class="row">
    <div class="col-md-1">Link</div>
    <div class="col-md-8"><input type="text" class="inputbox" size="60" name="link" value="{{$project->link}}"/></div>
  </div><br/>
  <div class="row">
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn-secondary" id="cancel">Cancel</button>
    </div>
  </div>
{{ Form::close() }}
<script type="text/javascript">
$(document).ready(function(){
  $("#cancel").click(function(){
    window.location.href = {{route("projects.index")}};
  });
});
</script>