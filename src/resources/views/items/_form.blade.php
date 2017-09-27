{{Form::model($item, array('route' =>$route,'method'=>$method)) }}
  @if ($project)
    {{Form::hidden("project_id",$project->id)}}
    <div class="row">
     <div class="col-md-1 offset-md-1">Project:</div>
     <div class="col-md-8">{{$project->title}}</div>
    </div>
  @else
    <div class="row">
     <div class="col-md-1 offset-md-1">Project:</div>
     <div class="col-md-8">{{ Form::select ("project_id",$projects) }}</div>
    </div>
  @endif
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

  <div class="row">
    <div class="col-md-2 offset-md-2">
      {{Form::submit("Save",["class"=>"btn btn-primary"])}}
    </div>
    <div class="col-md-4">
      <a class="btn btn-secondary" href="{{ url()->previous() }}" id="cancel">Cancel</a>
    </div>
  </div>
  {{ Form::close()}}