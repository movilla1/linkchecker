{{Form::model($item, array('route' =>$route,'method'=>$method)) }}
  @if(isset($item->id))
    <div class="row">
      <div class="col-md-1 offset-md-1">Id</div>
      <div class="col-md-8">{{$item->id}}</div>
    </div>
    <br>
  @endif
  <div class="row">
    <div class="col-md-1 offset-md-1">Website</div>
    <div class="col-md-8">
      {{Form::text("website",null,["class"=>"inputbox","size"=>"50"])}}
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1">Back Link</div>
    <div class="col-md-8">
    {{Form::text("backlink",null,["class"=>"inputbox","size"=>"50"])}}
    </div>
  </div><br/><br/>
  {{Form::hidden("project_id",$project->id)}}
  <div class="row">
    <div class="col-md-6">{{Form::submit("Save",["class"=>"btn btn-primary"])}}</div>
    <div class="col-md-6">
        <a class="btn btn-secondary" href="{{route("items.index") }}" id="cancel">Cancel</a>
    </div>
  </div>
  {{ Form::close()}}